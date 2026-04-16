<div class="form-box">

    <h2>🎬 Add Review</h2>

    <form method="post">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <!-- FILM SELECT -->
        <div class="form-group">
            <label>Film</label>
            <select name="film_id" id="film-select" required>
                <?php foreach ($films as $film): ?>
                    <option value="<?= $film['id'] ?>"
                        data-image="<?= $film['image'] ?>"
                        data-desc="<?= htmlspecialchars($film['description']) ?>"
                        data-category="<?= htmlspecialchars($film['categories'] ?? '') ?>">
                        <?= htmlspecialchars($film['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- 🎬 FILM PREVIEW -->
        <div class="film-preview" id="film-preview">
            <img id="film-img">
            <div class="film-info">
                <p class="film-cat"></p>
                <p class="film-desc"></p>
            </div>
        </div>

        <!-- RATING -->
        <div class="form-group">
            <label>Rating</label>
            <div class="rating-input">
                <input type="hidden" name="rating" id="rating-value" value="5">
                <div class="stars">
                    <span data-value="1">★</span>
                    <span data-value="2">★</span>
                    <span data-value="3">★</span>
                    <span data-value="4">★</span>
                    <span data-value="5">★</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Review</label>
            <textarea name="content" required></textarea>
        </div>

        <div class="form-actions">
            <button class="btn-primary">Submit</button>
        </div>

    </form>

</div>

<script>
const select = document.getElementById('film-select');
const img = document.getElementById('film-img');
const desc = document.querySelector('.film-desc');
const cat = document.querySelector('.film-cat');

function updateFilm(){
    const o = select.options[select.selectedIndex];

    img.src = (window.location.pathname.includes('admin') ? '../uploads/' : 'uploads/') + o.dataset.image;
    desc.textContent = o.dataset.desc;

    cat.textContent = "🎬 " + (o.dataset.category && o.dataset.category !== '' 
        ? o.dataset.category 
        : 'No category');
}

select.addEventListener('change', updateFilm);
updateFilm();

/* RATING */
const stars = document.querySelectorAll('.stars span');
const input = document.getElementById('rating-value');
let current = 5;

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