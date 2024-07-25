<?php
function show($stuff): void{
  echo '<pre>';
  print_r($stuff);
  echo '</pre>';
}

function find_active_class(string $title, string $anchor): string{
  return $title == $anchor ? 'active' : '';
}

