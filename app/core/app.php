<?php
class App{
  private string | object $controller = 'home';
  private string $method = 'index';
  private array $params = [];

  function __construct(){
    $url = $this->split_url();
    if(isset($url[0]) && file_exists("../app/controllers/$url[0].php")){
      require "../app/controllers/$url[0].php";
      $this->controller = new $url[0];
    }else{
      generate_error_page('404, Page not found!', ROOT . 'assets/illustrations/404-page-not-found.svg');
    }
    if(isset($url[1]) && method_exists($this->controller, $url[1])){
      $this->method = $url[1];
    }
    call_user_func_array([$this->controller, $this->method], [$this->params=array_slice($url, 2)]);
  }

  private function split_url(): array{
    if(isset($_GET['url'])){
      return explode('/', trim($_GET['url'], '/'));
    }
  }
}