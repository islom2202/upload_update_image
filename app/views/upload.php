<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title><?=$title?></title>
</head>
<body>
  <!--header-->
  <?php require "partials/header.php"; ?>
  <p><?=$title?> page</p>
  <form action=<?= ROOT .'upload/image'?> method='POST' enctype="multipart/form-data" >
    <input type="text" placeholder='name' name='name'><br><br>
    <input type="file" accept="image/jpeg, image/png" name="file"><br><br>
    <button type="submit" name="upload">Upload image</button>
  </form>
</body>
</html>