<?php

class RequestContext {

    public static function createFromGlobals() {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        return new RequestContext($uri, $method);
    }

    private string $uri;
    private HttpMethod $method;

    private function __construct($uri, $method) {
        $this->uri = $uri;
        $this->method = HttpMethod::StringToHTTPMethod($method);
    }

    public function getUri(): string{
        return $this->uri;
    }

    public function getMethod(): HttpMethod {
        return $this->method;
    }

    public function __toString() {
        return sprintf("RequestContext(uri=%s, method=%s)", $this->uri, HttpMethod::HttpMethodToString($this->method));
    }
}