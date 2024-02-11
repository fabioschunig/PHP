<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Helper\FileUploadHelper;
use Alura\Mvc\Repository\VideoRepository;

class NewVideoController implements Controller
{
    use \Alura\Mvc\Helper\FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if ($url === false) {
            $this->addErrorMessage('URL inválida');
            header('Location: /novo-video');
            return;
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if ($titulo === false) {
            $this->addErrorMessage('Título inválido');
            header('Location: /novo-video');
            return;
        }

        $video = new Video($url, $titulo);

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

        $success = $this->videoRepository->add($video);
        if ($success === false) {
            $this->addErrorMessage('Erro ao cadastrar o vídeo');
            header('Location: /novo-video');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}
