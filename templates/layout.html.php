<!DOCTYPE html>
<html>
<head>
    <title>Film Review</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- HEADER -->
<div class="header">
    🎬 FILM REVIEW
    <span class="header-sub">Discover Movie Reviews</span>
</div>

<!-- NAVBAR -->
<div class="navbar">

    <a href="reviews.php">Reviews</a>
    <a href="addreview.php">Add Review</a>
    <a href="contact.php">Contact</a>
    <a href="admin/reviews.php">Admin</a>

</div>

<div class="container">
    <?= $output ?>
</div>

</body> 
</html>