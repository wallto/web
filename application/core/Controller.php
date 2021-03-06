<?php

namespace application\core;

use application\core\View;
use application\core\App;
abstract class Controller extends App{

	public $route;
	public $view;
	public $acl;

	public function __construct($route, Request $request) {
		$this->route = $route;
		$this->view = new View($route, $request);
		if (!$this->checkAcl()) {
			//View::errorCode(403);
			$this->view->redirect('/admin/login');
		}

		$this->repository = $this->loadRepository($route['controller']);
	}

	public function loadRepository($name) {
		$path = 'application\repository\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	public function checkAcl() {
	    return true;
//		$this->acl = require 'application/acl/'.$this->route['controller'].'.php';
//		if ($this->isAcl('all')) {
//			return true;
//		}
//		elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('authorize')) {
//			return true;
//		}
//		elseif (!isset($_SESSION['authorize']['id']) and $this->isAcl('guest')) {
//			return true;
//		}
//		elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
//			return true;
//		}
//		elseif (isset($_SESSION['admin'])) {
//			return true;
//		}
//		return false;
	}

	public function isAcl($key) {
		return in_array($this->route['action'], $this->acl[$key]);
	}

}
