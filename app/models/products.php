<?php
class Products{
  public function get_data(){
    $query = "SELECT * FROM products";
    $database =  new Database();
    return $database->read($query);
  }
}