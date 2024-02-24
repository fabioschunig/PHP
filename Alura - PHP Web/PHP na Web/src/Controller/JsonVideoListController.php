<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class JsonVideoListController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $videoList = array_map(
            function (Video $video): array {
                $filePath = $video->getFilePath() ? '/img/upload/' . $video->getFilePath() : null;

                return [
                    'url' => $video->url,
                    'title' => $video->title,
                    'file_path' => $filePath,
                ];
            },
            $this->videoRepository->all()
        );

        $jsonResponse = json_encode($videoList);

        return new Response(body: $jsonResponse);
    }
}
