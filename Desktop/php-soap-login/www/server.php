<?php
class AuthService {
    public function login($username, $password) {
        if ($username === "admin" && $password === "123456") {
            return "OK";
        } else {
            return "FAIL";
        }
    }
}

$options = ['uri' => 'http://localhost'];
$server = new SoapServer(null, $options);
$server->setClass('AuthService');
$server->handle();
