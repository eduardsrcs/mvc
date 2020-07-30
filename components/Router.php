<?php

/**
 * Router class
 */

 class Router
{
  private $routes;

  public function __construct()
  {
    $routesPath = ROOT . '/config/routes.php';
    $this->routes = include($routesPath);
  }

  /**
   * Returns request string
   * @return string
   */
  private function getURI()
  {
    if(!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }

  public function run()
  {
    $uri = $this->getURI();

    foreach($this->routes as $uriPattern => $path) {
      // echo "<br>$uriPattern -> $path";
      if(preg_match("~$uriPattern~", $uri)) {
        $segments = explode('/', $path);

        $controllerName = array_shift($segments).'Controller';
        $controllerName = ucfirst($controllerName);
        $actionName = 'action'.ucfirst((array_shift($segments)));
        $controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
            
        if (file_exists($controllerFile)) {
          include_once($controllerFile);
        }
            
            // ddv([$controllerFile, $controllerName, $actionName]);
        $controllerObject = new $controllerName;
        $result = $controllerObject->$actionName();
        if ($result != null) {
          break;
        }
      }
    }

  }

}