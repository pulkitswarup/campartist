<?php

namespace Campartist\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/geo")
 */
class SearchController extends Controller
{
    /**
     * @Route(name="searchform")
     * @Method({"GET"})
     */
    public function indexAction(Request $request) {
        return $this->render("CampartistCatalogBundle::Desktop/index.html.twig");
    }
}
