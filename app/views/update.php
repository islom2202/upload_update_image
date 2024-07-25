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
  <!--main-->
  <main>
    <!--grid list-->
    <ul class='items'>
      <?php foreach($productsData as $data){
        $url = ROOT . 'update/updateProduct';
        $dataName = $data['name'];
        $dataId = $data['id'];
        $dataImage = $data['image'];
        echo 
        "
        <li>
          <form action=$url method='POST' enctype='multipart/form-data'>
            <input value=$dataName name='name'> 
            <input type='hidden' name='id' value=$dataId></input>
            <div class='imageWrapper'>
              <img class='imageWrapper__image' src=$dataImage alt='user'>
              <p class='imageWrapper__pen'>✏</p>
              <input type='file' name='file' accept='image/jpeg, image/png' class='imageWrapper__fileSelector'>
            </div>
            <button type='submit' name='update' style='background-color: red'>Update</button>
          </form>
        </li>
        ";
      }?>
    </ul>
  </main>
  <script>
    const pens = document.querySelectorAll('.imageWrapper__pen');
    const fileSelectors = document.querySelectorAll('.imageWrapper__fileSelector');
    for(let i = 0; i < pens.length; i++){
      pens[i].onclick = () => fileSelectors[i].click();
    }
  </script>
</body>
</html>