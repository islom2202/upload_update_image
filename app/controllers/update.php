<?php
  class Update{
    public function index($params=[]){
      $title = 'update';
      $model = 'products';
      if(file_exists("../app/models/$model.php")){
        require "../app/models/$model.php";
        $products = new Products();
        $productsData = $products->get_data();
      }
      if(file_exists("../app/views/$title.php")){
        require "../app/views/$title.php";
      }
    }
    
    public function updateProduct(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Update the name of the product
        $id = $_POST['id'];
        $name = $_POST['name'];
        $db = new Database();
        if($name){
          $db->write('UPDATE products SET name = :name WHERE id = :id', [':name' => $name, ':id' => $id]);
        }else{
          generate_error_page('Please add a name for this image!', ROOT . 'assets/illustrations/full-moon-face.svg');
        }

        // Update the image of the product
        if(isset($_POST['update']) && $_FILES['file']['error'] != 4){ // 4 = no file is selected
          $file = $_FILES['file'];
          $fileName = $file['name'];
          $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
          $allowed = ['png', 'jpg', 'jpeg'];

            //- check file extension
            if(!in_array($fileExt, $allowed)){
              echo 'You cannot upload the file of this type';
              return;
            }
            //- check for errors
            if($file['error'] != 0){
              echo 'There was an error uploading your file!';
              return;
            }
            //- check file size
            if($file['size'] > 5000 * 1024){
              echo 'Image size should not be more than 5mb!';
              return;
            }

            //- get existing image path
            $database = new Database();
            $existingPath = $database->read('SELECT image FROM products WHERE id = :id', [':id' => $id]);
            $existingPath = $existingPath[0]['image'];

            //- delete existing image path
            if(file_exists($existingPath)){
              unlink($existingPath);
            };

            //- move the uploaded file
            $newFileName = uniqid('', true) . ".$fileExt";
            $newDestination = "../public/assets/images/$newFileName";
            move_uploaded_file($file['tmp_name'], $newDestination);
            //- add to database
            $database->write('UPDATE products SET image = :image WHERE id = :id', [':image' => $newDestination, ':id' => $id]);
        }
        // Navigate to the home page
        header('Location:' . ROOT .  'home');
      }
    }
  } 
  