<?php

namespace BCSample\Shipping\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;
use Twig\Environment;

class ErrorController
{
    public function __construct(
        private readonly Environment $twig,
    ) {
    }

    public function show(Throwable $exception): Response
    {
        $code = $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : 500;

        $templates = [
            'errors/' . $code . '.html.twig',
            'errors/' . substr((string)$code, 0, 2) . 'x.html.twig',
            'errors/' . substr((string)$code, 0, 1) . 'xx.html.twig',
            'errors/default.html.twig',
        ];

        foreach ($templates as $template) {
            if ($this->twig->getLoader()->exists($template)) {
                return new Response($this->twig->render($template, ['code' => $code]), $code);
            }
        }

        return new Response('An error occurred.', $code);
    }
}
