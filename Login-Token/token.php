<?php

//print_r($_SERVER);

$token = $_SERVER['HTTP_AUTHORIZATION'];

$decoded = base64_decode($token);

$user = str_replace('token:', '', $decoded);

echo $user . PHP_EOL;
