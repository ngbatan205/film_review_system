<div class="form-box">

    <h2>✏️ Edit Review</h2>

    <form method="post">

        <input type="hidden" name="id" value="<?= $review['id'] ?>">
        <input type="hidden" name="reviewer_id" value="<?= $review['reviewer_id'] ?>">

        <!-- NAME -->
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name"
                value="<?= htmlspecialchars($review['name'] ?? '') ?>" required>
        </div>

        <!-- EMAIL -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
                value="<?= htmlspecialchars($review['email'] ?? '') ?>" required>
        </div>

        <!-- FILM -->
        <div class="form-group">
            <label>Film</label>
            <select name="film_id" required>
                <?php foreach ($films as $film): ?>
                    <option value="<?= $film['id'] ?>"
                        <?= $film['id'] == $review['film_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($film['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- RATING -->
        <div class="form-group">
            <label>Rating</label>
            <div class="rating-input">
                <input type="hidden" name="rating" id="rating-value"
                       value="<?= $review['rating'] ?? 5 ?>">

                <div class="stars">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span data-value="<?= $i ?>">★</span>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <!-- REVIEW -->
        <div class="form-group">
            <label>Review</label>
            <textarea name="content" required><?= htmlspecialchars($review['content'] ?? '') ?></textarea>
        </div>

        <!-- ACTION -->
        <div class="form-actions">
            <button class="btn-primary">Update</button>

            <button class="btn-danger"
                    name="delete"
                    value="<?= $review['id'] ?>"
                    onclick="return confirm('Delete this review?')">
                Delete
            </button>
        </div>

    </form>

</div>

<!-- RATING -->
<script>
const stars = document.querySelectorAll('.stars span');
const input = document.getElementById('rating-value');

let current = parseInt(input.value) || 5;

highlight(current);

stars.forEach(star => {
    star.addEventListener('mouseover', () => highlight(star.dataset.value));
    star.addEventListener('mouseout', () => highlight(current));
    star.addEventListener('click', () => {
        current = star.dataset.value;
        input.value = current;
        highlight(current);
    });
});

function highlight(val) {
    stars.forEach(s => {
        s.classList.toggle('active', s.dataset.value <= val);
    });
}
</script>