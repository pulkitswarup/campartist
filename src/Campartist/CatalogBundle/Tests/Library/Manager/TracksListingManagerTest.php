<?php

use CatalogBundle\Tests\Library\Manager;

use Campartist\CatalogBundle\Library\Manager\Factory;
use Campartist\CatalogBundle\Library\Manager\TracksListingManager;

/**
 * @group unit
 */
class TracksListingManagerTest extends \PHPUnit_Framework_TestCase {
    
    public function testGetTopTracksByArtists() {
        $response = $this->getMockBuilder('\MusicCatalog\Artists\Provider\Lastfm\Response')
                        ->disableOriginalConstructor()
                        ->setMethods(['getData'])
                        ->getMock();

        $response->expects($this->once())
                 ->method('getData')
                 ->will($this->returnValue(['artists'=>[]]));

        $service = $this->getMockBuilder('\MusicCatalog\Artists\Provider\Lastfm\Lastfm')
                         ->disableOriginalConstructor()
                         ->setMethods(['getTopTracks'])
                         ->getMock();

        $service->expects($this->exactly(2))
                ->method('getTopTracks')
                ->with($this->equalTo('Adele'), $this->equalTo(1))
                ->will($this->returnValue($response));

        $this->assertInstanceOf('\MusicCatalog\Artists\Provider\Lastfm\Response', $service->getTopTracks('Adele', 1));

        $collection = $this->getMockBuilder('\MusicCatalog\Artists\Factory')
                           ->disableOriginalConstructor()
                           ->setMethods(['getService'])
                           ->getMock();
        $collection->expects($this->exactly(2))
                   ->method('getService')
                   ->with($this->equalTo(['api_key'=>'']))
                   ->will($this->returnValue($service));

        $this->assertInstanceOf('\MusicCatalog\Artists\Provider\Lastfm\Lastfm', $collection->getService(['api_key'=>'']));

        $musicCatalog = $this->getMockBuilder('\MusicCatalog\Factory')
                             ->disableOriginalConstructor()
                             ->setMethods(['getCollection'])
                             ->getMock();

        $musicCatalog->expects($this->exactly(2))
                     ->method('getCollection')
                     ->with($this->equalTo('Artists'), $this->equalTo('Lastfm'))
                     ->will($this->returnValue($collection));

        $this->assertInstanceOf('\MusicCatalog\Artists\Factory', $musicCatalog->getCollection('Artists', 'Lastfm'));

        $factory = $this->getMockBuilder('\Campartist\CatalogBundle\Library\Manager\Factory')
                        ->setMethods(['getMusicCatalog'])
                        ->getMock();

        $factory->expects($this->exactly(2))
                ->method('getMusicCatalog')
                ->will($this->returnValue($musicCatalog));

        $this->assertInstanceOf('\MusicCatalog\Factory', $factory->getMusicCatalog());

        $tracksListingManager = new TracksListingManager($factory);
        $response = $tracksListingManager->getTopTracksByArtists('Adele', 1, ['Lastfm'=>['api_key'=>'']]);
        $this->assertEquals(['artists'=>[]], $response);
    }
}