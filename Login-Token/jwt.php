<?php

print_r($_SERVER);

$email = 'test@email.com';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

echo $email;
