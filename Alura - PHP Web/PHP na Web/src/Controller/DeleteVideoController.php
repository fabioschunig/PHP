<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class DeleteVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            $_SESSION['error_message'] = 'ID inválido';
            header('Location: /remover-video');
            return;
        }

        $success = $this->videoRepository->remove($id);
        if ($success === false) {
            $_SESSION['error_message'] = 'Erro ao excluir vídeo';
            header('Location: /remover-video');
        } else {
            header('Location: /?sucesso=1');
        }

    }
}
