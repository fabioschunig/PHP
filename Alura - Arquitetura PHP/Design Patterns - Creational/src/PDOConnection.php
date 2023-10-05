<?php

namespace Alura\DesignPattern;

class PDOConnection extends \PDO
{
    private static ?self $instance = null;

    private function __construct(
        string $dsn,
        ?string $username = null,
        ?string $password = null,
        ?array $options = null
    ) {
        parent::__construct($dsn, $username, $password, $options);
    }

    public static function getInstance(
        string $dsn,
        ?string $username = null,
        ?string $password = null,
        ?array $options = null
    ): self {
        if (is_null(self::$instance)) {
            self::$instance = new static($dsn, $username, $password, $options);
        }

        return self::$instance;
    }
}
