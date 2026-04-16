<h2>Edit Reviewer</h2>

<form method="post">

<input type="hidden" name="id" value="<?= $reviewer['id'] ?>">

<div>
<label>Name</label>
<input name="name" value="<?= htmlspecialchars($reviewer['name'] ?? '') ?>">
</div>

<div>
<label>Email</label>
<input name="email" value="<?= htmlspecialchars($reviewer['email'] ?? '') ?>">
</div>

<button>Update</button>

</form>