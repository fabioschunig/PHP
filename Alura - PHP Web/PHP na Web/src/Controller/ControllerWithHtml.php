<?php

declare(strict_types=1);

namespace Alura\Mvc\Controller;

class ControllerWithHtml
{
    private const TEMPLATE_PATH = __DIR__ . '/../../views/';

    protected function renderTemplate(string $templateName): void
    {
        require_once self::TEMPLATE_PATH . $templateName . '.php';
    }
}
