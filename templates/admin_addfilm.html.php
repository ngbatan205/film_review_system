<div class="form-box">

<h2>Add Film</h2>

<form method="post" enctype="multipart/form-data">

<input name="title" placeholder="Title" required>

<textarea name="description" placeholder="Description"></textarea>

<!-- CATEGORY MULTI -->
<div class="form-group">
    <label>Categories</label>
    <div class="checkbox-group">
        <?php foreach ($categories as $c): ?>
            <label>
                <input type="checkbox" name="categories[]" value="<?= $c['id'] ?>">
                <?= htmlspecialchars($c['name']) ?>
            </label>
        <?php endforeach; ?>
    </div>
</div>

<input type="file" name="image">

<button class="btn-primary">Add Film</button>

</form>

</div>