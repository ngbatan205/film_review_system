<div class="page-header">

    <div class="page-title">
        <h2>Films</h2>
        <span class="total-badge <?= $badgeClass ?? '' ?>">
            <?= $total ?>
        </span>
    </div>

    <form method="GET" class="search-form">

    <!-- SEARCH -->
    <input type="text" name="search" placeholder="Search films..."
           value="<?= htmlspecialchars($search ?? '') ?>">

    <!-- CATEGORY FILTER -->
    <select name="category_id">
        <option value="">All Categories</option>
        <?php foreach ($categories as $c): ?>
            <option value="<?= $c['id'] ?>"
                <?= (($_GET['category_id'] ?? '') == $c['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button>Search</button>
    <a href="films.php">Reset</a>

    </form>

    <a href="addfilm.php" class="button">+ Add Film</a>

</div>

<div class="grid">

<?php foreach ($films as $f): ?>
<div class="card">

    <div class="poster">
        <?php if ($f['image']): ?>
            <img src="../uploads/<?= htmlspecialchars($f['image']) ?>">
        <?php else: ?>
            <img src="../uploads/default.jpg">
        <?php endif; ?>

        <div class="poster-title">
            <?= htmlspecialchars($f['title']) ?>
        </div>
    </div>

    <div class="card-content">

        <p class="category">
            🎬 <?= htmlspecialchars($f['categories'] ?? 'No Category') ?>
        </p>

        <p class="film-desc">
            <?= mb_substr(htmlspecialchars($f['description']), 0, 80) ?>...
        </p>

        <div class="actions">
            <a href="editfilm.php?id=<?= $f['id'] ?>">Edit</a>
            <a href="films.php?delete=<?= $f['id'] ?>"
               onclick="return confirm('Delete this film?')">
               Delete
            </a>
        </div>

    </div>

</div>
<?php endforeach; ?>

</div>