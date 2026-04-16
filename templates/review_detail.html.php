<div class="form-box review-detail">

    <!-- TITLE -->
    <h2 class="detail-title">
        🎬 <?= htmlspecialchars($review['title']) ?>
    </h2>

    <!-- FILM BLOCK -->
    <div class="film-detail">

        <!-- POSTER -->
        <div class="poster detail-poster">
            <img src="uploads/<?= htmlspecialchars($review['film_image'] ?: 'default.jpg') ?>">

            <!-- RATING -->
            <div class="imdb-badge">
                ⭐ <?= $review['rating'] ?>/5
            </div>
        </div>

        <!-- INFO -->
        <div class="film-info">

            <p class="film-cat">
                🎬 <?= !empty($review['categories']) 
                    ? htmlspecialchars($review['categories']) 
                    : 'No category' ?>
            </p>

            <p class="film-desc full">
                <?= htmlspecialchars($review['description']) ?>
            </p>

        </div>

    </div>

    <hr>

    <!-- REVIEWER -->
    <div class="review-meta">
        <p><strong>👤 Reviewer:</strong> <?= htmlspecialchars($review['name']) ?></p>
        <p><strong>✉️ Email:</strong> <?= htmlspecialchars($review['email']) ?></p>
        <p><strong>⏱ Date:</strong> <?= htmlspecialchars($review['created_at']) ?></p>
    </div>
    <!-- REVIEW CONTENT -->
    <div class="review-content-box">
        <?= nl2br(htmlspecialchars($review['content'])) ?>
    </div>

    <!-- BACK -->
    <div class="detail-actions">
        <a href="reviews.php" class="button">← Back</a>
    </div>

</div>