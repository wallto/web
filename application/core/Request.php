<?php


namespace application\core;


class Request
{
    public $method;
    public $path;
    public $baseUrl;
    public $getData;
    public $postData;
    public $headers;

    public function __construct()
    {
        $this->setMethod();
        $this->setPath();
        $this->setBaseUrl();
        $this->setGetData();
        $this->setPostData();
        $this->setHeaders();
    }

    private function setMethod() {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private function setPath() {
        $this->path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    private function setBaseUrl() {
        $this->baseUrl = $_SERVER['SERVER_NAME'];
    }

    private function setGetData() {
        $this->getData = $_GET;
    }

    private function setPostData() {
        $this->postData = $_POST;
    }

    private function setHeaders() {
        $headers = array();
        foreach($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }
            $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
            $headers[$header] = $value;
        }

        $this->headers = $headers;
    }
}
