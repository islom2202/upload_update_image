<?php
  class Update{
    public function index($params=[]){
      $title = 'update';
      if(file_exists("../app/views/$title.php")){
        require "../app/views/$title.php";
      }
    }
  } 