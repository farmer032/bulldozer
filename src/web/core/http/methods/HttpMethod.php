<?php

enum HttpMethod {

    case GET;
    case POST;
    case PUT;
    case DELETE;

    public static function HttpMethodToString($httpMethod): string
    {
        return match ($httpMethod) {
            HttpMethod::GET => 'GET',
            HttpMethod::POST => 'POST',
            HttpMethod::PUT => 'PUT',
            HttpMethod::DELETE => 'DELETE'
        };
    }

    public static function StringToHTTPMethod($str): HttpMethod
    {
        return match (strtoupper($str)) {
             'GET' => HttpMethod::GET,
             'POST' => HttpMethod::POST,
             'PUT' => HttpMethod::PUT,
             'DELETE' => HttpMethod::DELETE
        };
    }
}

