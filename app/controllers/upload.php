<?php
  class Upload{
    public function index($params=[]){
      $title = 'upload';
      if(file_exists("../app/views/$title.php")){
        require "../app/views/$title.php";
      }
    }

    // upload image file
    public function image(){
      if(isset($_POST['upload'])){
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileExt = strtolower(explode('.', $fileName)[1]);
        $allowed = ['jpg', 'jpeg', 'png'];
        if(in_array($fileExt, $allowed)){
          if($file['error'] == 0){
            if($file['size'] / 1024 <= 5000){
              $newFileName = uniqid('', true) . ".$fileExt";
              $newDestination = '../public/assets/images/' . $newFileName;
              move_uploaded_file($file['tmp_name'], $newDestination);
              $database = new Database();
              $database->write("INSERT INTO products (name, image) VALUES (:name, :image)", ['name' => $_POST['name'], 'image' => $newDestination]);
              header('Location:' . ROOT  . 'home');
            }else{
              echo "Image size should not be more than 5mb!";
            }
          }else{
            echo 'There was an error uploading your file!';
          }
        }else{
          echo "You cannot upload a file of this type!";
        }
      }
    }
  } 