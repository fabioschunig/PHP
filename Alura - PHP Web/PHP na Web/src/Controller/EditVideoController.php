<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Helper\FileUploadHelper;
use Alura\Mvc\Repository\VideoRepository;

class EditVideoController implements Controller
{
    use \Alura\Mvc\Helper\FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            $this->addErrorMessage('ID inválido');
            header('Location: /editar-video');
            return;
        }

        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if ($url === false) {
            $this->addErrorMessage('URL inválida');
            header('Location: /editar-video');
            return;
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if ($titulo === false) {
            $this->addErrorMessage('Título inválido');
            header('Location: /editar-video');
            return;
        }

        $video = new Video($url, $titulo);
        $video->setId($id);

        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpFileName = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];

            if (FileUploadHelper::checkFileIsImage($tmpFileName)) {
                $filePathName = FileUploadHelper::moveUploadFile(
                    $tmpFileName,
                    $fileName,
                    __DIR__ . '/../../public/img/upload/'
                );
                $video->setFilePath($filePathName);
            }
        }

        $success = $this->videoRepository->update($video);

        if ($success === false) {
            $this->addErrorMessage('Erro ao editar vídeo');
            header('Location: /editar-video');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}
