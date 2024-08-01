<?php

$dbPath = 'sqlite:./database/database.sqlite';
$pdo = new PDO($dbPath);

$login = 'test@email.com';

$sql = 'SELECT id, password FROM user WHERE login = ?;';
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

$verify = password_verify($password, $user['password']);

if (!$verify) {
    echo "Invalid password" . PHP_EOL;
    exit;
}

echo "Password OK!" . PHP_EOL;
