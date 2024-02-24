<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginController implements Controller
{
    use \Alura\Mvc\Helper\FlashMessageTrait;

    private \PDO $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../../banco.sqlite';
        $this->pdo = new \PDO("sqlite:$dbPath");
    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $queryPost = $request->getParsedBody();

        $email = filter_var($queryPost['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($queryPost['password']);

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

            return new Response(302, [
                'Location' => '/',
            ]);
        } else {
            $this->addErrorMessage('Usuário ou senha inválidos');
            return new Response(302, [
                'Location' => '/login',
            ]);
        }
    }
}
