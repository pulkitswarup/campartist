<?php

namespace Campartist\CatalogBundle\Library\Manager;

use Campartist\CatalogBundle\Library\Manager\Factory;

class TracksListingManager {
    
    private $factory;

    public function __construct($factory) {
        $this->factory = $factory;
    }
    public function getTopTracksByArtists($artist, $page, $config) {
        $catalog = $this->factory->getMusicCatalog();
        $collection = $catalog->getCollection('Artists', 'Lastfm');
        $response = $collection->getService($config['Lastfm'])->getTopTracks($artist, $page);
        return $response->getData();
    }
}