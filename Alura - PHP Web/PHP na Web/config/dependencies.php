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
    \League\Plates\Engine::class => function () {
        $templatePath = __DIR__ . '/../views';
        return new \League\Plates\Engine($templatePath);
    }
]);


/** @var \Psr\Container\ContainerInterface $container */
$container = $builder->build();

return $container;
