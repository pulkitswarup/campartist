<?php

namespace CatalogBundle\Tests\Library\Manager;

use Campartist\CatalogBundle\Library\Manager\Factory;

/**
 * @group unit
 */
class FactoryTest extends \PHPUnit_Framework_TestCase 
{
    private $factory;

    public function setUp() {
        $this->factory = new Factory();
    }
    public function testGetMusicCatalog() {
        $musicCatalog = $this->factory->getMusicCatalog();
        $this->assertInstanceOf('\MusicCatalog\Factory', $musicCatalog);
    }

    public function testGetGeoListingManager() {
        $geoListingManager = $this->factory->getGeoListingManager();
        $this->assertInstanceOf('\Campartist\CatalogBundle\Library\Manager\GeoListingManager', $geoListingManager);
    }

    public function testTracksListingManager() {
        $tracksListingManager = $this->factory->getTracksListingManager();
        $this->assertInstanceOf('Campartist\CatalogBundle\Library\Manager\TracksListingManager', $tracksListingManager);
    }

    public function tearDown() {
        $this->factory = null;
    }
}