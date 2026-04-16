<div class="form-box">

    <h2>Contact Us</h2>

    <?php if ($messageSent): ?>
        <p style="color:green;">Message sent successfully!</p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post">

        <div class="form-group">
            <label>Your Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Your Email:</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Your Message:</label>
            <textarea name="message" required></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Send</button>
        </div>

    </form>

</div>