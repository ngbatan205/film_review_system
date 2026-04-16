<!DOCTYPE html>
<html>
<head>
    <title>Admin Film Review</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    🎬 FILM REVIEW
    <span class="header-sub">Admin Dashboard</span>
</div>

<!-- NAVBAR -->
<div class="navbar">
    <a href="reviews.php" class="<?= $page=='reviews' ? 'active' : '' ?>">Reviews</a>
    <a href="films.php" class="<?= $page=='films' ? 'active' : '' ?>">Films</a>
    <a href="reviewers.php" class="<?= $page=='reviewers' ? 'active' : '' ?>">Reviewers</a>
    <a href="categories.php" class="<?= $page=='categories' ? 'active' : '' ?>">Categories</a>
    <a href="contacts.php" class="<?= $page=='contacts' ? 'active' : '' ?>">Contact</a>
    <a href="../logout.php" class="logout">Logout</a>
</div>

<!-- CONTENT -->
<div class="container">
    <?= $output ?>
</div>

</body>
</html>