<?php

namespace Campartist\CatalogBundle\Library\Manager;

use Campartist\CatalogBundle\Library\Manager\Factory;

class GeoListingManager {
    
    private $factory;

    public function __construct($factory) {
        $this->factory = $factory;
    }
    public function getTopArtistsByCountry($country, $page, $config) {
        $catalog = $this->factory->getMusicCatalog();
        $collection = $catalog->getCollection('Geo', 'Lastfm');
        $response = $collection->getService($config['Lastfm'])->getTopArtists($country, $page);
        return $response->getData();
    }
}