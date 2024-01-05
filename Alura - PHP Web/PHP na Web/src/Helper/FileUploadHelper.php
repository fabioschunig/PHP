<?php

namespace Alura\Mvc\Helper;

class FileUploadHelper
{
    public static function checkFileIsImage(string $filePath): bool
    {
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($filePath);

        return (str_starts_with($mimeType, 'imagem/'));
    }
}
