<?php
class ApiService {
    public function sayHello($name) {
        return "Hello, $name!";
    }

    public function add($a, $b) {
        return $a + $b;
    }
}

$server = new SoapServer(null, [
    'uri' => "http://localhost/soap"
]);

$server->setClass('ApiService');
$server->handle();