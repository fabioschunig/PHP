<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class DeleteVideoController implements Controller
{
    use \Alura\Mvc\Helper\FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            $this->addErrorMessage('ID inválido');
            header('Location: /remover-video');
            return;
        }

        $success = $this->videoRepository->remove($id);
        if ($success === false) {
            $this->addErrorMessage('Erro ao excluir vídeo');
            header('Location: /remover-video');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}
