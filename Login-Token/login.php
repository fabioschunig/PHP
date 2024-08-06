<?php

require_once './connection.php';

$login = 'test@email.com';

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
if (isset($argv[1])) {
    $password = $argv[1];
}

$verify = password_verify($password, $user['password']);

if (!$verify) {
    echo "Invalid password" . PHP_EOL;
    exit;
}

echo "Password OK!" . PHP_EOL;

$hash = 'token:' . $user['login'];
echo base64_encode($hash) . PHP_EOL;
