<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sqlTableVideos = "CREATE TABLE videos (id INTEGER PRIMARY KEY, url TEXT, title TEXT);";

$pdo->exec($sqlTableVideos);
