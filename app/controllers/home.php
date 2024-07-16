<?php
  class Home{
    public function index($params=[]){
      $title = 'home';
      if(file_exists("../app/models/$title.php")){
        require "../app/models/$title.php";
        $homeModel = new Home_Model();
        $homeData = $homeModel->get_data();
      }
      if(file_exists("../app/views/$title.php")){
        require "../app/views/$title.php";
      }
    }
  } 