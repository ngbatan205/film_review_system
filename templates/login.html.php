<div class="form-box login-box">

    <h2>🔐 Admin Login</h2>

    <?php if (!empty($error)): ?>
        <p style="color:red; text-align:center"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button class="btn-primary">Login</button>

    </form>

</div>