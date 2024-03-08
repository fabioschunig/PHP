<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginFormController implements RequestHandlerInterface
{
    use \Alura\Mvc\Helper\HtmlRenderTrait;

    public function __construct(private Engine $templates)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if ((array_key_exists('logado', $_SESSION)) && ($_SESSION['logado'] === true)) {
            return new Response(302, [
                'Location' => '/',
            ]);
        }

        $loginForm = $this->templates->render('login-form');

        return new Response(body: $loginForm);
    }
}
