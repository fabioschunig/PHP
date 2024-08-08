<?php

require 'vendor/autoload.php';

use Firebase\JWT\JWT;

// print_r($_SERVER);

$email = 'test@email.com';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

// echo $email;

$tokenJwt = JWT::encode(['user' => $email], 'private_key', 'HS256');

echo $tokenJwt;
