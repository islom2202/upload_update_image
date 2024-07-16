<?php
  class About{
    public function index($params=[]){
      $title = 'about';
      if(file_exists("../app/views/$title.php")){
        require "../app/views/$title.php";
      }
    }
  } 