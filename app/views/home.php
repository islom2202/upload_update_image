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
  <!--main-->
  <main>
    <p><?=$title?> page</p>
    <!--grid list-->
    <ul style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 2rem; list-style: none">
      <?php foreach($homeData as $data){
        echo 
        "
        <li>
          <h3>" . $data['name'] . "</h3>
          <img src=" . $data['image'] . " alt='user' style='width: 100%; height: 400px; object-fit:cover'>
        </li>
        ";
      }?>
    </ul>
  </main>
</body>
</html>