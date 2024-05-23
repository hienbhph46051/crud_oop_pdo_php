<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<a href="index.php?url=views/Add.php">Thêm sản phẩm</a>
<table border="1px solid">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Action</th>
  </tr>
    <?php foreach ($products as $value) { ?>
      <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['name'] ?></td>
        <td><?= $value['price'] ?></td>
        <td>
          <a href="index.php?url=views/Edit.php?id=<?= $value['id'] ?>">Edit</a>
          <a href="index.php?url=views/delete?id=<?= $value['id'] ?>">Delete</a>
        </td>
      </tr>
    <?php } ?>
</table>
</body>
</html>