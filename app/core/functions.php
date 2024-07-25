<?php
function show($stuff): void{
  echo '<pre>';
  print_r($stuff);
  echo '</pre>';
}

function find_active_class(string $title, string $anchor): string{
  return $title == $anchor ? 'active' : '';
}

function generate_error_page(string $errorMessage=null, string $imageUrl=null, string $htmlCode=null): void{
  require('../app/views/errorpage.php');
  die();
}