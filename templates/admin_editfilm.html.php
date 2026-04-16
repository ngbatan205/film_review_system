<?php $selected = getFilmCategories($pdo, $film['id']); ?>

<div class="form-box">

<h2>Edit Film</h2>

<form method="post" enctype="multipart/form-data">

    <!-- hidden -->
    <input type="hidden" name="id" value="<?= $film['id'] ?>">
    <input type="hidden" name="old_image" value="<?= $film['image'] ?>">

    <!-- TITLE -->
    <div class="form-group">
        <label>Title</label>
        <input name="title" value="<?= htmlspecialchars($film['title']) ?>" required>
    </div>

    <!-- DESCRIPTION -->
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" required><?= htmlspecialchars($film['description']) ?></textarea>
    </div>

    <!-- CATEGORY -->
    <div class="form-group">
        <label>Categories</label>

        <div class="category-group">
            <?php foreach ($categories as $c): ?>
            <div class="category-item">

                <label for="cat<?= $c['id'] ?>">
                    <?= htmlspecialchars($c['name']) ?>
                </label>

                <input type="checkbox"
                       id="cat<?= $c['id'] ?>"
                       name="categories[]"
                       value="<?= $c['id'] ?>"
                       <?= in_array($c['id'], $selected) ? 'checked' : '' ?>>

            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- IMAGE -->
    <div class="form-group">
        <label>Upload Image</label>
        <input type="file" name="image">
    </div>

    <!-- PREVIEW -->
    <?php if ($film['image']): ?>
    <div class="film-preview">
        <img src="../uploads/<?= htmlspecialchars($film['image']) ?>">
        <div class="film-info">
            <div class="film-cat">Current Image</div>
            <div class="film-desc">
                This is the current poster of the film. Upload a new one to replace it.
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- BUTTON -->
    <div class="form-actions">
        <button class="btn-primary">Update</button>
    </div>

</form>

</div>