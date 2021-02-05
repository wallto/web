<?php

namespace application\core;


class View{

	public $path;
	public $route;
	public $vars;
	public $layout = 'default';
    public $request;

    public function __construct($route, Request $request) {
		$this->route = $route;
		$this->request = $request;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function render($title, $vars = []) {
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
		$name ='Main';
		$name = 'application\models\\'.ucfirst($name);
//		$this->func = new $name;
//		$footer = $this->func->getFooter();
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();

			if(!empty($this->request->headers['Accept']) && str_contains($this->request->headers['Accept'], 'application/json')) {
                exit(json_encode(["title" => $title, "content" => $content]));
            } else require 'application/views/layouts/'.$this->layout.'.php';
//			if(!empty($this->request->headers['Accept']))
//            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
//                exit(json_encode(["title" => $title, "content" => $content]));
//            } else require 'application/views/layouts/'.$this->layout.'.php';

		}
	}

    /**
     * exit json content
     *
     * @param $title
     * @param array $vars
     */
    public function toAjax($title, $vars = []) {

        extract($vars);
        $path = 'application/views/'.$this->path.'.php';
        $name ='Main';
        $name = 'application\models\\'.ucfirst($name);
        $this->func = new $name;
        $footer = $this->func->getFooter();
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            exit(json_encode(["content" => $content]));
        }
    }

	public function redirect($url) {
		header('location: '.$url);
		exit;
	}

	public static function errorCode($code, $reason = null) {
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	public function message($status, $message) {
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

	public function location($url) {
		exit(json_encode(['url' => $url]));
	}

}
