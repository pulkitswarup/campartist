<?php

namespace Campartist\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Campartist\CatalogBundle\Library\Manager\Factory;

class DetailsController extends Controller
{
    /**
     * @Route("/toptracks/{artist}", name="listing")
     * @Route("/toptracks/{artist}/{page}", requirements={"page" = "\d+"}, name="listing")
     * @Method({"GET"})
     */
    public function listingAction($artist, $page = 1) {
        $config = $this->container->getParameter('campartist_catalog.config');
        $Factory = new Factory();
        $geoListingManager = $Factory->getTracksListingManager();
        $results = $geoListingManager->getTopTracksByArtists($artist, $page, $config);

        $uri = $this->generateUrl('listing', array('artist' => $artist));
        $pagination = $this->getPagination($results['total'], $results['rpp'], $page, $uri);

        return $this->render("CampartistCatalogBundle::Desktop/tracks.html.twig", ["results" => $results, "pagination" => $pagination]);
    }

    private function getPagination($total, $rpp, $current_page, $base_uri) {
        $base_uri .= "/";
        $paginator = new \Paginator\Paginator();
        $pagination = $paginator
                        ->total($total)
                        ->base_uri($base_uri)
                        ->per_page($rpp)
                        ->page_name('p')
                        ->ul_class('pagination')
                        ->page_active($current_page)
                        ->paginate();
        return $pagination;
    }
}