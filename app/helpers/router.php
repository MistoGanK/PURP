<?php
class Router
{
  private $routes = [
    'GET' => [],
    'POST' => []
  ];
  /**
   * Maps a GET route to its respective controller and action.
   * @param string $action           The action name or URL indentifier (e.g: 'denuncia_nueva')
   * @param array  $controllerAction An array containing the controller class and the method name (e.g: [HomeController::class, 'index'])
   * @return void
   */
  public function get(string $action, array $controllerAction)
  {
    $this->routes['GET'][$action] = $controllerAction;
  }

  /**
   * Maps a POST route to its respective controller and action.
   * @param string $action            The action name or URL indentifier (e.g: 'denuncia_nueva')
   * @param array  $controllerAction  An array containing the controller class and the method name (e.g controller name (e.g., [AuthController::class, 'login'])
   * @return void
   */
  public function post(string $action, array $controllerAction)
  {
    $this->routes['POST'][$action] = $controllerAction;
  }

  /**
   * Dispatches the request to the corresponding controller and method based on action and HTTP method.
   * @param string $action The requested action identifier (e.g., 'home')
   * @param string $method The HTTP request method (e.g., 'GET', 'POST')
   * @return void
   */
  public function dispatch(string $action, string $method)
  {
    $method = strtoupper($method);

    if (isset($this->routes[$method][$action])) {
      $target = $this->routes[$method][$action];

      $controller = $target[0];
      $actionMethod = $target[1];

      if (class_exists($controller) && method_exists($controller, $actionMethod)) {
        // Dinamic Call
        $controller::$actionMethod();
        return;
      }
    } else {
      // Security fall back
      http_response_code(404);
      echo __('error_404');
    }
  }
}
