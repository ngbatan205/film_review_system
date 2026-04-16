<?php

/* ================= CORE ================= */

function query($pdo, $sql, $params = [])
{
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

/* ================= LOGIN ================= */

function login($pdo)
{
    if (isset($_POST['username'])) {

        $stmt = query($pdo, 'SELECT * FROM users WHERE username = :username', [
            'username' => $_POST['username']
        ]);

        $user = $stmt->fetch();

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['admin'] = true;
            header('Location: admin/reviews.php');
            exit();
        } else {
            return "Incorrect account or password!";
        }
    }
}

/* ================= FILM ================= */

function getAllFilms($pdo, $search = '', $category_id = '')
{
    $sql = "
        SELECT 
            film.*,
            GROUP_CONCAT(category.name SEPARATOR ', ') AS categories
        FROM film
        LEFT JOIN film_category fc ON film.id = fc.film_id
        LEFT JOIN category ON fc.category_id = category.id
    ";

    $conditions = [];
    $params = [];

    if (!empty($search)) {
        $conditions[] = "film.title LIKE :search";
        $params['search'] = '%' . $search . '%';
    }

    if (!empty($category_id)) {
        $conditions[] = "film.id IN (
            SELECT film_id FROM film_category WHERE category_id = :category_id
        )";
        $params['category_id'] = $category_id;
    }

    if ($conditions) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $sql .= " GROUP BY film.id ORDER BY film.id DESC";

    return query($pdo, $sql, $params)->fetchAll();
}


function getFilm($pdo, $id)
{
    return query($pdo, 'SELECT * FROM film WHERE id=:id', ['id' => $id])->fetch();
}

function saveFilm($pdo)
{
    if (isset($_POST['title'])) {

        $image = '';

        if (!empty($_FILES['image']['name'])) {
            $file = uniqid() . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $file);
            $image = $file;
        }

        query($pdo, 'INSERT INTO film (title,description,image)
        VALUES (:title,:description,:image)', [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image' => $image
        ]);

        $film_id = $pdo->lastInsertId();

        if (!empty($_POST['categories'])) {
            foreach ($_POST['categories'] as $cat_id) {
                query($pdo, 'INSERT INTO film_category (film_id, category_id)
                VALUES (:film_id,:category_id)', [
                    'film_id' => $film_id,
                    'category_id' => $cat_id
                ]);
            }
        }

        header('Location: films.php');
        exit();
    }
}

function updateFilm($pdo)
{
    if (isset($_POST['id'])) {

        $image = $_POST['old_image'];

        if (!empty($_FILES['image']['name'])) {
            $file = uniqid() . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $file);
            $image = $file;
        }

        query($pdo, 'UPDATE film SET 
            title=:title,
            description=:description,
            image=:image
            WHERE id=:id', [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image' => $image,
            'id' => $_POST['id']
        ]);

        query($pdo, 'DELETE FROM film_category WHERE film_id=:id', [
            'id' => $_POST['id']
        ]);

        if (!empty($_POST['categories'])) {
            foreach ($_POST['categories'] as $cat_id) {
                query($pdo, 'INSERT INTO film_category (film_id, category_id)
                VALUES (:film_id,:category_id)', [
                    'film_id' => $_POST['id'],
                    'category_id' => $cat_id
                ]);
            }
        }

        header('Location: films.php');
        exit();
    }
}

/* DELETE FILM */
function deleteFilm($pdo)
{
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {

        query($pdo, 'DELETE FROM film WHERE id = :id', [
            'id' => $_GET['delete']
        ]);

        header('Location: films.php');
        exit();
    }
}

function getFilmCategories($pdo, $film_id)
{
    $stmt = query($pdo, 'SELECT category_id FROM film_category WHERE film_id=:id', [
        'id' => $film_id
    ]);
    return array_column($stmt->fetchAll(), 'category_id');
}

/* ================= CATEGORY ================= */

function getCategories($pdo)
{
    return $pdo->query('SELECT * FROM category')->fetchAll();
}


/* ================= REVIEW ================= */

function getReviews($pdo, $search = '', $film_id = '')
{
    $sql = "
        SELECT 
            review.*, 
            film.title, 
            film.description, 
            film.image AS film_image,
            GROUP_CONCAT(category.name SEPARATOR ', ') AS categories,
            reviewer.name,
            reviewer.email
        FROM review
        JOIN film ON review.film_id = film.id
        LEFT JOIN film_category fc ON film.id = fc.film_id
        LEFT JOIN category ON fc.category_id = category.id
        JOIN reviewer ON review.reviewer_id = reviewer.id
    ";

    $conditions = [];
    $params = [];

    if (!empty($search)) {
        $conditions[] = "(film.title LIKE :search OR review.content LIKE :search)";
        $params['search'] = '%' . $search . '%';
    }

    if (!empty($film_id)) {
        $conditions[] = "film.id = :film_id";
        $params['film_id'] = $film_id;
    }

    if ($conditions) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $sql .= " GROUP BY review.id ORDER BY review.created_at DESC";

    return query($pdo, $sql, $params)->fetchAll();
}

function getReview($pdo, $id)
{
    return query($pdo, "
        SELECT review.*, 
               reviewer.name, 
               reviewer.email
        FROM review
        JOIN reviewer ON review.reviewer_id = reviewer.id
        WHERE review.id = :id
    ", ['id' => $id])->fetch();
}

/* REVIEW DETAIL */
function getReviewDetail($pdo, $id)
{
    return query($pdo, "
        SELECT 
            review.*, 
            film.title, 
            film.description, 
            film.image AS film_image,
            GROUP_CONCAT(category.name SEPARATOR ', ') AS categories,
            reviewer.name,
            reviewer.email
        FROM review
        JOIN film ON review.film_id = film.id
        LEFT JOIN film_category fc ON film.id = fc.film_id
        LEFT JOIN category ON fc.category_id = category.id
        JOIN reviewer ON review.reviewer_id = reviewer.id
        WHERE review.id = :id
        GROUP BY review.id
    ", ['id' => $id])->fetch();
}

/* SAVE REVIEW */
function saveReview($pdo)
{
    if (isset($_POST['content'])) {

        $email = trim($_POST['email']);

        // INVALID EMAIL
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format");
        }

        $stmt = query($pdo, 'SELECT id FROM reviewer WHERE email = :email', [
            'email' => $email
        ]);

        $reviewer = $stmt->fetch();

        if ($reviewer) {
            $reviewer_id = $reviewer['id'];

            query($pdo, 'UPDATE reviewer SET name = :name WHERE id = :id', [
                'name' => $_POST['name'],
                'id' => $reviewer_id
            ]);

        } else {
            query($pdo, 'INSERT INTO reviewer(name,email)
            VALUES(:name,:email)', [
                'name' => $_POST['name'],
                'email' => $email
            ]);

            $reviewer_id = $pdo->lastInsertId();
        }

        query($pdo, 'INSERT INTO review(film_id,reviewer_id,content,rating)
        VALUES(:film_id,:reviewer_id,:content,:rating)', [
            'film_id' => $_POST['film_id'],
            'reviewer_id' => $reviewer_id,
            'content' => $_POST['content'],
            'rating' => $_POST['rating'] ?? 5
        ]);

        header('Location: reviews.php');
        exit();
    }
}

/* UPDATE REVIEW */
function updateReview($pdo)
{
    if (isset($_POST['id'])) {

        if (isset($_POST['delete'])) {
            query($pdo, 'DELETE FROM review WHERE id=:id', [
                'id' => $_POST['delete']
            ]);
            header('Location: reviews.php');
            exit();
        }

        query($pdo, 'UPDATE review SET 
            content = :content,
            film_id = :film_id,
            rating = :rating
            WHERE id = :id', [
            'content' => $_POST['content'],
            'film_id' => $_POST['film_id'],
            'rating' => $_POST['rating'],
            'id' => $_POST['id']
        ]);

        query($pdo, 'UPDATE reviewer SET 
            name = :name,
            email = :email
            WHERE id = :reviewer_id', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'reviewer_id' => $_POST['reviewer_id']
        ]);

        header('Location: reviews.php');
        exit();
    }
}

/* DELETE REVIEW */
function deleteReview($pdo)
{
    if (isset($_POST['delete']) && is_numeric($_POST['delete'])) {

        query($pdo, 'DELETE FROM review WHERE id = :id', [
            'id' => $_POST['delete']
        ]);

        header('Location: reviews.php');
        exit();
    }
}

/* ================= REVIEWER ================= */

function getReviewers($pdo, $search = '')
{
    $sql = "SELECT * FROM reviewer";
    $params = [];

    if (!empty($search)) {
        $sql .= " WHERE name LIKE :search OR email LIKE :search";
        $params['search'] = "%$search%";
    }

    $sql .= " ORDER BY id DESC";

    return query($pdo, $sql, $params)->fetchAll();
}

function getReviewer($pdo, $id)
{
    return query($pdo, 'SELECT * FROM reviewer WHERE id=:id', ['id' => $id])->fetch();
}

function updateReviewer($pdo)
{
    if (isset($_POST['id'])) {

        query($pdo, 'UPDATE reviewer SET 
            name=:name,
            email=:email
            WHERE id=:id', [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'id' => $_POST['id']
        ]);

        header('Location: reviewers.php');
        exit();
    }
}

/* DELETE REVIEWER */
function deleteReviewer($pdo)
{
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {

        query($pdo, 'DELETE FROM reviewer WHERE id=:id', [
            'id' => $_GET['delete']
        ]);

        header('Location: reviewers.php');
        exit();
    }
}

/* ================= DASHBOARD ================= */

function getTotalReviews($pdo)
{
    return $pdo->query('SELECT COUNT(*) FROM review')->fetchColumn();
}

function getTotalFilms($pdo)
{
    return $pdo->query('SELECT COUNT(*) FROM film')->fetchColumn();
}

function getTotalReviewers($pdo)
{
    return $pdo->query('SELECT COUNT(*) FROM reviewer')->fetchColumn();
}

/* ================= CATEGORY ADMIN ================= */

function getAllCategories($pdo, $search = '')
{
    $sql = "SELECT * FROM category";
    $params = [];

    if (!empty($search)) {
        $sql .= " WHERE name LIKE :search";
        $params['search'] = "%$search%";
    }

    $sql .= " ORDER BY id DESC";

    return query($pdo, $sql, $params)->fetchAll();
}

function getCategory($pdo, $id)
{
    return query($pdo, 'SELECT * FROM category WHERE id=:id', [
        'id' => $id
    ])->fetch();
}

function saveCategory($pdo)
{
    if (isset($_POST['name'])) {
        query($pdo, 'INSERT INTO category(name) VALUES(:name)', [
            'name' => $_POST['name']
        ]);
        header('Location: categories.php');
        exit();
    }
}

function updateCategory($pdo)
{
    if (isset($_POST['id'])) {
        query($pdo, 'UPDATE category SET name=:name WHERE id=:id', [
            'name' => $_POST['name'],
            'id' => $_POST['id']
        ]);
        header('Location: categories.php');
        exit();
    }
}

function deleteCategory($pdo)
{
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {

        query($pdo, 'DELETE FROM category WHERE id=:id', [
            'id' => $_GET['delete']
        ]);

        header('Location: categories.php');
        exit();
    }
}

/* ================= CONTACT ================= */

function sendContactEmail($pdo)
{
    $messageSent = false;
    $error = '';

    if (isset($_POST['email'])) {

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $content = trim($_POST['message']);

        if (empty($name) || empty($email) || empty($content)) {
            $error = "Please fill all fields";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        } else {

            query($pdo, 'INSERT INTO contact (name, email, message)
            VALUES (:name, :email, :message)', [
                'name' => $name,
                'email' => $email,
                'message' => $content
            ]);

            @mail("your_email@gmail.com", "New Contact Message", $content);

            $messageSent = true;
        }
    }

    return [
        'messageSent' => $messageSent,
        'error' => $error
    ];
}

function getContacts($pdo, $search = '')
{
    $sql = "SELECT * FROM contact";
    $params = [];

    if (!empty($search)) {
        $sql .= " WHERE name LIKE :search 
                  OR email LIKE :search 
                  OR message LIKE :search";
        $params['search'] = "%$search%";
    }

    $sql .= " ORDER BY id DESC";

    return query($pdo, $sql, $params)->fetchAll();
}

function deleteContact($pdo)
{
    if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {

        query($pdo, 'DELETE FROM contact WHERE id=:id', [
            'id' => $_GET['delete']
        ]);

        header('Location: contacts.php');
        exit();
    }
}