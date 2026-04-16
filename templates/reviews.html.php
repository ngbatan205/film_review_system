<div class="page-header">

    <div class="page-title">
        <h2>Film Reviews</h2>
        <span class="total-badge"><?= $total ?></span>
    </div>

    <!-- SEARCH -->
    <form method="get" class="search-form">

        <input type="text" name="search" placeholder="Search..."
               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

        <select name="film_id">
            <option value="">All Films</option>
            <?php foreach ($films as $f): ?>
                <option value="<?= $f['id'] ?>"
                    <?= (($_GET['film_id'] ?? '') == $f['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($f['title']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Search</button>
        <a href="reviews.php">Reset</a>

    </form>

</div>

<a href="addreview.php" class="button">+ Add Review</a>

<div class="grid">

<?php foreach ($reviews as $r): ?>

<div class="card review-card"
     onclick="window.location='review_detail.php?id=<?= $r['id'] ?>'">

    <!-- POSTER -->
    <div class="poster">
        <img src="uploads/<?= htmlspecialchars($r['film_image'] ?: 'default.jpg') ?>">

        <!-- RATING -->
        <div class="imdb-badge">
            ⭐ <?= htmlspecialchars($r['rating']) ?>/5
        </div>

        <!-- TITLE -->
        <div class="poster-title">
            <?= htmlspecialchars($r['title']) ?>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="card-content">

        <!-- CATEGORY -->
        <p class="category">
            🎬 <?= htmlspecialchars($r['categories'] ?? 'No Category') ?>
        </p>

        <!-- FILM DESCRIPTION -->
        <p class="film-desc">
            <?= mb_substr(htmlspecialchars($r['description']), 0, 80) ?>...
        </p>

        <!-- REVIEW CONTENT -->
        <p class="film-desc">
            <strong>Review:</strong>
            <?= mb_substr(htmlspecialchars($r['content']), 0, 80) ?>...
        </p>

        <!-- META -->
        <div class="meta">
            👤 <?= htmlspecialchars($r['name']) ?><br>
            ⏱ <?= htmlspecialchars($r['created_at']) ?>
        </div>

    </div>

</div>

<?php endforeach; ?>

</div>