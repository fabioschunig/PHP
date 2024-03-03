<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Helper\FileUploadHelper;
use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NewVideoController implements RequestHandlerInterface
{
    use \Alura\Mvc\Helper\FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryPost = $request->getParsedBody();

        $url = filter_var($queryPost['url'], FILTER_VALIDATE_URL);
        if ($url === false) {
            $this->addErrorMessage('URL inválida');
            return new Response(302, [
                'Location' => '/novo-video',
            ]);
        }

        $titulo = filter_var($queryPost['titulo']);
        if ($titulo === false) {
            $this->addErrorMessage('Título inválido');
            return new Response(302, [
                'Location' => '/novo-video',
            ]);
        }

        $video = new Video($url, $titulo);

        $files = $request->getUploadedFiles();
        /** @var UploadedFileInterface $uploadedImage */
        $uploadedImage = $files['image'];

        if ($uploadedImage->getError() === UPLOAD_ERR_OK) {
            // $tmpFileName = $_FILES['image']['tmp_name'];
            $tmpFileName = $uploadedImage->getStream()->getMetadata('uri');
            // $fileName = $_FILES['image']['name'];
            $fileName = $uploadedImage->getClientFilename();

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
            return new Response(302, [
                'Location' => '/novo-video',
            ]);
        } else {
            return new Response(200, [
                'Location' => '/',
            ]);
        }
    }
}
