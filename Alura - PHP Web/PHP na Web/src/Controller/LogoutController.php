<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class LogoutController implements Controller
{
    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        // session_destroy();
        // alternativa para não destruir sessão
        $_SESSION['logado'] = false;
        unset($_SESSION['logado']);

        return new Response(302, [
            'Location' => '/login',
        ]);
    }
}
