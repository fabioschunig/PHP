<?php

namespace TaskRestApi\Infrastructure\Persistence;

use PDO;

class PdoConnectionCreator
{
    public static function createConnection(): PDO
    {
        $connection = new PDO(
            'mysql:host=127.0.0.1;dbname=task_rest_api',
            'root',
            '',
        );

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
