<?php
  class Home{
    public function index($params=[]){
      $title = 'home';
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
  } 