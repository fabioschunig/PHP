<?php

require_once './connection.php';

$login = 'test@email.com';

// read e-mail from command line
if (isset($argv[1])) {
    $login = $argv[1];
}

$sql = 'SELECT id, login, password FROM user WHERE login = ?;';
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $login);
$stm->execute();

$user = $stm->fetch(\PDO::FETCH_ASSOC);

if ($user === false) {
    echo "User not found" . PHP_EOL;
    exit;
}

// echo $user['password'] . PHP_EOL;

// plain text password
$password = '123456';

// read arg from command line
if (isset($argv[2])) {
    $password = $argv[2];
}

$verify = password_verify($password, $user['password']);

if (!$verify) {
    echo "Invalid password" . PHP_EOL;
    exit;
}

// echo "Password OK!" . PHP_EOL;

$hash = 'token:' . $user['login'];
echo base64_encode($hash);
