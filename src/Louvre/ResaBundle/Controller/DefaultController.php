<?php

namespace Louvre\ResaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LouvreResaBundle:Default:index.html.twig');
    }
}
