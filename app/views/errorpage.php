<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
  <title>Document</title>
</head>
<body>
  <?php
  if(isset($errorMessage)){
    echo "<h2>$errorMessage</h2>";
  }
  if(isset($imageUrl)){
    echo "<img src=$imageUrl alt='error image' class='errorImage'>";
  }
  if(isset($htmlCode)){
    echo $htmlCode;
  }
  ?>
  
</body>
</html>