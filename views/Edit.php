<form method="POST" action="index.php?url=views/Edit.php">
  <div>
    <input type="hidden" name="id"
           value="<?= htmlspecialchars($product['id']) ?>">
    <label for="name">Name</label>
    <input type="text" name="name"
           value="<?= htmlspecialchars($product['name']) ?>" required>
    <br>
    <label for="price">Price</label>
    <input type="text" name="price"
           value="<?= htmlspecialchars($product['price']) ?>" required>
  </div>
  <button type="submit">Edit</button>
</form>