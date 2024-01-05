<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

class LoginController implements Controller
{
    private \PDO $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../../banco.sqlite';
        $this->pdo = new \PDO("sqlite:$dbPath");
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        $sql = "SELECT * FROM users WHERE email = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);
        $passwordHashed = $userData['password'] ?? '';
        $correctPassword = password_verify($password, $passwordHashed);

        if ($correctPassword) {
            if (password_needs_rehash($passwordHashed, PASSWORD_DEFAULT)) {
                $sqlUpdatePassword = "UPDATE users SET password = ? WHERE id = ?";
                $statement = $this->pdo->prepare($sqlUpdatePassword);
                $statement->bindValue(1, password_hash($password, PASSWORD_DEFAULT));
                $statement->bindValue(2, $userData['id']);
                $statement->execute();
            }

            $_SESSION['logado'] = true;

            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }
    }
}
