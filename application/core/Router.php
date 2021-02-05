<?php
namespace application\core;
use application\core\View;

class Router {
    protected $routes = [];
    protected $params = [];
    protected $request;

    public function __construct() {
        $arr = require 'application/config/routes.php';
        $this->request = new Request();
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }
    public function add($route, $params) {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }
    public function match() {
        $url = trim($this->request->path, '/');

        foreach ($this->routes as $route => $params) {

            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        if (is_numeric($match)) {
                            $match = (int) $match;
                        }
                        $params[$key] = $match;
                    }
                }

                if(isset($params['method'])) {
                    if(!$this->equalsMethod($this->request->method, $params['method'])) {
                        return false;
                    }
                }

                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function run(){
        if($this->match()) {
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if(class_exists($path)) {
                $action = $this->params['action'].'Action';
                if(method_exists($path, $action)) {
                    $controller = new $path($this->params, $this->request);
                    $controller->$action();
                } else {
//                    View::errorCode(404);
                    echo "Action: ".$action." not found";
                }
            } else {
//                View::errorCode(404);
                echo "Controller: ".$path." not found";
            }
        } else {
//            View::errorCode(404);
            echo "Path not found";
        }
    }

    public function equalsMethod ($request_method, $route_method ) {
        if(strcasecmp($request_method, $route_method) == 0) {
            return true;
        }
        return false;
    }


}
