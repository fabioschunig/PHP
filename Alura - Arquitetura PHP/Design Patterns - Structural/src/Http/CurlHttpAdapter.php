<?php

namespace Alura\DesignPattern\Http;

class CurlHttpAdapter implements HttpAdapter
{
    public function post(string $url, array $data = []): void
    {
        echo "curl http adapter" . PHP_EOL;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, $data);
        curl_exec($curl);
    }
}
