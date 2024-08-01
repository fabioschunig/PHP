<?php

$dbPath = 'sqlite:./database/database.sqlite';
$pdo = new PDO($dbPath);

$login = 'test@email.com';

// insert with plain text password
$password = '123456';

$sql = 'INSERT INTO user (login, password) VALUES (?, ?)';
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $login);
$stm->bindValue(2, $password);

$stm->execute();
