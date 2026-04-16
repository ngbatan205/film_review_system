<div class="form-box small">

    <h2>Edit Category</h2>

    <form method="post">

        <input type="hidden" name="id" value="<?= $category['id'] ?>">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name"
                value="<?= htmlspecialchars($category['name']) ?>" required>
        </div>

        <div class="form-actions">
            <button class="btn-primary">Update</button>
        </div>

    </form>

</div>