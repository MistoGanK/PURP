<?php
class Router
{
  private $routes = [
    'GET' => [],
    'POST' => []
  ];

  // Register a GET route
  public function get(string $action, array $controllerAction)
  {
    $this->routes['GET'][$action] = $controllerAction;
  }

  // Register a POST route
  public function post(string $action, array $controllerAction)
  {
    $this->routes['POST'][$action] = $controllerAction;
  }

  public function dispatch(string $action, string $method)
  {
    $method = strtoupper($method);

    if (isset($this->routes[$method][$action])) {
      $target = $this->routes[$method][$action];

      $controller = $target[0];
      $actionMethod = $target[1];

      // Dinamic Call
      $controller::$actionMethod();
    } else {
      http_response_code(404);
      echo __('error_404');
    }
  }
}
