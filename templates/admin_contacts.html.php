<div class="page-header">

    <div class="page-title">
        <h2>Contact Messages</h2>
        <span class="total-badge"><?= $total ?></span>
    </div>

    <form class="search-form">
        <input type="text" placeholder="Search messages...">
        <button>Search</button>
    </form>

</div>

<div class="grid">

<?php foreach ($contacts as $c): ?>
<div class="card contact-card">

    <div class="card-content">

        <div class="contact-avatar-inline">
            <?= strtoupper(substr($c['email'], 0, 1)) ?>
        </div>

        <div class="contact-email">
            👤 <?= htmlspecialchars($c['name']) ?>
        </div>

        <div class="meta">
            📧 <?= htmlspecialchars($c['email']) ?>
        </div>

        <div class="contact-message">
            <?= htmlspecialchars($c['message']) ?>
        </div>

        <div class="contact-time">
            ⏱ <?= $c['created_at'] ?>
        </div>

        <div class="actions">
            <a href="contacts.php?delete=<?= $c['id'] ?>">Delete</a>
        </div>

    </div>

</div>
<?php endforeach; ?>

</div>