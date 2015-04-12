<?php
namespace Booking\Util;

use Booking\App;
use Booking\Core\Place\AbstractPlace;

class Dump
{
    private $pimple;

    public function __construct(Container $pimple)
    {
        $this->pimple = $pimple;
    }

    public function dumpPlace(AbstractPlace $place, $template = '_dumpPlace.html.twig')
    {
        $templatesDir = $this->pimple->get('config')->getParameter('system')['templatesDir'];

        $loader = new \Twig_Loader_Filesystem(APP_ROOT . $templatesDir);

        $twig = new \Twig_Environment($loader, array());
        $twig->addExtension(new \Twig_Extension_Debug());

        return $twig->render($template, array('place'=>$place));
    }
}