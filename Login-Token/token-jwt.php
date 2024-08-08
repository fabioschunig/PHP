<?php

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$tokenJwt = $_SERVER['HTTP_AUTHORIZATION'];

// echo $tokenJwt;

$decoded = JWT::decode($tokenJwt, new Key('private_key', 'HS256'));

// print_r($decoded);

echo $decoded->user;
