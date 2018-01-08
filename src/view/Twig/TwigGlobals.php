<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 07/01/2018
 * Time: 01:55
 */

namespace Fin\view\Twig;


use Fin\Auth\AuthInterface;

class TwigGlobals extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var AuthInterface
     */
    private $auth;


    /**
     * TwigGlobals constructor.
     */
    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function getGlobals()
    {
        return [
            'Auth' => $this->auth
        ];
    }
}