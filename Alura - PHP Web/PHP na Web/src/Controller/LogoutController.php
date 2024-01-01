<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

class LogoutController implements Controller
{
    public function processaRequisicao(): void
    {
        // session_destroy();
        // alternativa para não destruir sessão
        $_SESSION['logado'] = false;
        unset($_SESSION['logado']);

        header('Location: /login');
    }
}
