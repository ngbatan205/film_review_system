<div class="form-box">

<h2>🎬 Add Review</h2>

<form method="post">

<input name="name" placeholder="Name" required>
<input name="email" placeholder="Email" required>

<select name="film_id" id="film-select">
<?php foreach ($films as $film): ?>
<option value="<?= $film['id'] ?>"
    data-image="<?= $film['image'] ?>"
    data-desc="<?= htmlspecialchars($film['description']) ?>"
    data-category="<?= htmlspecialchars($film['categories'] ?? '') ?>">
    <?= htmlspecialchars($film['title']) ?>
</option>
<?php endforeach; ?>
</select>

<!-- 🎬 PREVIEW -->
<div class="film-preview">
    <img id="film-img">
    <div class="film-info">
        <p class="film-cat"></p>
        <p class="film-desc"></p>
    </div>
</div>

<!-- RATING -->
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

<textarea name="content" placeholder="Review"></textarea>

<button>Submit</button>

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
    cat.textContent = "🎬 " + (o.dataset.category || 'No category');
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