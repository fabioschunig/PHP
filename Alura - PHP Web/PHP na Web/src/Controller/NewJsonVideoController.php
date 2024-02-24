<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

// to test
// - request type: POST
// - url: http://localhost:8080/videos
// - body: {"url": "https://www.youtube.com/embed/qrQ8f5uCYP0?si=ftGV-1LneZuY7Wwj", "title": "City and Colour"}
// - cookie header: PHPSESSID=copy_cookie_value; Path=/;

class NewJsonVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $request = file_get_contents('php://input');
        $videoData = json_decode($request, true);
        $video = new Video($videoData['url'], $videoData['title']);
        $this->videoRepository->add($video);

        return new Response(201); // created
    }
}
