<div class="page-header">

    <div class="page-title">
        <h2>Reviewers</h2>
        <span class="total-badge"><?= $total ?></span>
    </div>

    <form class="search-form">
        <input type="text" name="search" placeholder="Search reviewers...">
        <button>Search</button>
        <a href="reviewers.php">Reset</a>
    </form>

</div>

<div class="grid">

<?php foreach ($reviewers as $r): ?>
<div class="card">

    <div class="card-content">

        <h3><?= htmlspecialchars($r['name']) ?></h3>

        <p class="meta">
            📧 <?= htmlspecialchars($r['email']) ?>
        </p>

        <div class="actions">
            <a href="editreviewer.php?id=<?= $r['id'] ?>">Edit</a>
            <a href="reviewers.php?delete=<?= $r['id'] ?>">Delete</a>
        </div>

    </div>

</div>
<?php endforeach; ?>

</div>