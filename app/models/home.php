<?php

class Home_Model{
  public function get_data(){
    $query = "SELECT name, image FROM products";
    $database =  new Database();
    return $database->read($query);
  }
}