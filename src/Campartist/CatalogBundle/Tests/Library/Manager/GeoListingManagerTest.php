<?php

use CatalogBundle\Tests\Library\Manager;

use Campartist\CatalogBundle\Library\Manager\Factory;
use Campartist\CatalogBundle\Library\Manager\GeoListingManager;

/**
 * @group unit
 */
class GeoListingManagerTest extends \PHPUnit_Framework_TestCase {
    
    public function testGetTopArtistByCountry() {
        $response = $this->getMockBuilder('\MusicCatalog\Geo\Provider\Lastfm\Response')
                        ->disableOriginalConstructor()
                        ->setMethods(['getData'])
                        ->getMock();

        $response->expects($this->once())
                 ->method('getData')
                 ->will($this->returnValue(['artists'=>[]]));

        $service = $this->getMockBuilder('\MusicCatalog\Geo\Provider\Lastfm\Lastfm')
                         ->disableOriginalConstructor()
                         ->setMethods(['getTopArtists'])
                         ->getMock();

        $service->expects($this->exactly(2))
                ->method('getTopArtists')
                ->with($this->equalTo('India'), $this->equalTo(1))
                ->will($this->returnValue($response));

        $this->assertInstanceOf('\MusicCatalog\Geo\Provider\Lastfm\Response', $service->getTopArtists('India', 1));

        $collection = $this->getMockBuilder('\MusicCatalog\Geo\Factory')
                           ->disableOriginalConstructor()
                           ->setMethods(['getService'])
                           ->getMock();
        $collection->expects($this->exactly(2))
                   ->method('getService')
                   ->with($this->equalTo(['api_key'=>'']))
                   ->will($this->returnValue($service));

        $this->assertInstanceOf('\MusicCatalog\Geo\Provider\Lastfm\Lastfm', $collection->getService(['api_key'=>'']));

        $musicCatalog = $this->getMockBuilder('\MusicCatalog\Factory')
                             ->disableOriginalConstructor()
                             ->setMethods(['getCollection'])
                             ->getMock();

        $musicCatalog->expects($this->exactly(2))
                     ->method('getCollection')
                     ->with($this->equalTo('Geo'), $this->equalTo('Lastfm'))
                     ->will($this->returnValue($collection));

        $this->assertInstanceOf('\MusicCatalog\Geo\Factory', $musicCatalog->getCollection('Geo', 'Lastfm'));

        $factory = $this->getMockBuilder('\Campartist\CatalogBundle\Library\Manager\Factory')
                        ->setMethods(['getMusicCatalog'])
                        ->getMock();

        $factory->expects($this->exactly(2))
                ->method('getMusicCatalog')
                ->will($this->returnValue($musicCatalog));

        $this->assertInstanceOf('\MusicCatalog\Factory', $factory->getMusicCatalog());

        $geoListingManager = new GeoListingManager($factory);
        $response = $geoListingManager->getTopArtistsByCountry('India', 1, ['Lastfm'=>['api_key'=>'']]);
        $this->assertEquals(['artists'=>[]], $response);
    }
}