<?php

$dbPath = 'sqlite:./database/database.sqlite';
$pdo = new PDO($dbPath);

$login = 'test@email.com';

// insert with plain text password
$password = '123456';

// hash MD5 - not recommended anymore
$hashMd5 = md5($password);

// using default algorithm
$hashDefault = password_hash($password, PASSWORD_DEFAULT);

$sql = 'INSERT INTO user (login, password) VALUES (?, ?)';
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $login);
// $stm->bindValue(2, $password);
// $stm->bindValue(2, $hashMd5);
$stm->bindValue(2, $hashDefault);

$stm->execute();
