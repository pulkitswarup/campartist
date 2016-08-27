<?php

namespace CatalogBundle\Tests\Library\MusicCatalog\Geo;

use MusicCatalog\Geo\Factory;

/**
 * @group unit
 */
class FactoryTest extends \PHPUnit_Framework_TestCase 
{
    public function testGetService() {
        $request = (new \MusicCatalog\Factory())->getHttpRequestInstance();
        $factory = new Factory('Lastfm', $request);
        $service = $factory->getService(['api_key']);
        $this->assertInstanceOf('\MusicCatalog\Geo\Provider\Lastfm\Lastfm', $service);
    }
}