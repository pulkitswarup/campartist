<?php

use CatalogBundle\Tests\Library\MusicCatalog;

use MusicCatalog\Factory;

/**
 * @group unit
 */
class FactoryTest extends \PHPUnit_Framework_TestCase 
{
    public function testGetCollection() {
        $factory = new Factory();
        $collection = $factory->getCollection('Geo', 'Lastfm');
        $this->assertInstanceOf('\MusicCatalog\Geo\Factory', $collection);
    }

    // public function testgetCollectionWrongType() {
    //     $factory = new Factory();
    //     $collection = $factory->getCollection('Album', 'Lastfm');
    // }

    public function testGetHttpRequestInstance() {
        $factory = new Factory();
        $request = $factory->getHttpRequestInstance();
        $this->assertInstanceOf('\MusicCatalog\Request', $request);
    }
}