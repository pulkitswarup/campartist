<?php

namespace Campartist\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Campartist\CatalogBundle\Library\Manager\Factory;
/**
 * @Route("/geo")
 */
class ListingController extends Controller
{
    /**
     * @Route("/{country}", requirements={"country" = "[A-Za-z ]+"}, name="searchresults")
     * @Route("/{country}/{page}", requirements={"country" = "[A-Za-z ]+", "page" = "\d+"}, name="searchresults")
     * @Method({"GET", "POST"})
     */
    public function resultsAction($country, $page = 1) {
        $config = $this->container->getParameter('campartist_catalog.config');
        $Factory = new Factory();
        $geoListingManager = $Factory->getGeoListingManager();
        $results = $geoListingManager->getTopArtistsByCountry($country, $page, $config);

        $uri = $this->generateUrl('searchresults', array('country' => $country));
        $pagination = $this->getPagination($results['total'], $results['rpp'], $page, $uri);

        return $this->render("CampartistCatalogBundle::Desktop/listing.html.twig", ["results" => $results, "pagination" => $pagination]);
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
