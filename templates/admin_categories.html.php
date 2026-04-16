<div class="page-header">

    <div class="page-title">
        <h2>Categories</h2>
        <span class="total-badge"><?= count($categories) ?></span>
    </div>

    <form class="search-form">
        <input type="text" placeholder="Search categories...">
        <button>Search</button>
    </form>

</div>

<div class="form-box small">
    <form method="post" class="inline-form">
        <input type="text" name="name" placeholder="New category..." required>
        <button class="btn-primary">Add</button>
    </form>
</div>

<div class="category-list">

<?php foreach ($categories as $c): ?>
<div class="category-item">

    <span class="cat-name">
        🎬 <?= htmlspecialchars($c['name']) ?>
    </span>

    <div class="cat-actions">
        <a href="editcategory.php?id=<?= $c['id'] ?>">Edit</a>
        <a href="categories.php?delete=<?= $c['id'] ?>">Delete</a>
    </div>

</div>
<?php endforeach; ?>

</div>