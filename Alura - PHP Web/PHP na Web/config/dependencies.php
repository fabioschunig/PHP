<?php

$builder = new \DI\ContainerBuilder();
// $builder->addDefinitions([
//     PDO::class => function (): PDO {
//         $dbPath = __DIR__ . '/../banco.sqlite';
//         return new PDO("sqlite:$dbPath");
//     }
// ]);
$dbPath = __DIR__ . '/../banco.sqlite';
$builder->addDefinitions([
    PDO::class => \DI\create(PDO::class)->constructor("sqlite:$dbPath"),
]);


/** @var \Psr\Container\ContainerInterface $container */
$container = $builder->build();

return $container;
