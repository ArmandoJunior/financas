<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 23:18
 */

namespace Fin\view;


use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class ViewRenderer implements ViewRendererInterface
{
    /**
     * @var \Twig_Environment
     */
    private $twigEnvironment;


    /**
     * ViewRenderer constructor.
     */
    public function __construct(\Twig_Environment $twigEnvironment)
    {
        $this->twigEnvironment = $twigEnvironment;
    }

    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEnvironment->render($template, $context);
        $response = new Response();
        $response->getBody()->write($result);
        return $response;
    }
}