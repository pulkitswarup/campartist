<?php

namespace Campartist\CatalogBundle\Library\Manager;

use MusicCatalog\Factory AS MusicCatalog;
use Campartist\CatalogBundle\Library\Manager\GeoListingManager;
use Campartist\CatalogBundle\Library\Manager\TracksListingManager;

class Factory {

    public function getMusicCatalog() {
        return new MusicCatalog();
    }

    public function getGeoListingManager() {
        return new GeoListingManager($this);
    }

    public function getTracksListingManager() {
        return new TracksListingManager($this);
    }
}