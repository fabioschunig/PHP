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

    public static function moveUploadFile(string $tmpName, string $fileName, string $dirPath): string
    {
        $fileName = uniqid('upload_') . '_' . pathinfo($fileName, PATHINFO_BASENAME);
        move_uploaded_file(
            $tmpName,
            $dirPath . $fileName,
        );
        return $fileName;
    }
}
