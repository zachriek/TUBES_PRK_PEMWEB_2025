<?php

class App
{
  protected $controller = 'HomeController';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseUrl();

    if (isset($url[4]) && file_exists(BASE_PATH . '/src/app/controllers/' . ucfirst($url[4]) . 'Controller.php')) {
      $this->controller = ucfirst($url[4]) . 'Controller';
      unset($url[4]);
    }

    require BASE_PATH . '/src/app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    if (isset($url[5]) && method_exists($this->controller, $url[5])) {
      $this->method = $url[5];
      unset($url[5]);
    }

    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function parseUrl()
  {
    if (isset($_GET['url'])) {
      return explode(
        '/',
        filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)
      );
    }

    return ['home'];
  }
}
