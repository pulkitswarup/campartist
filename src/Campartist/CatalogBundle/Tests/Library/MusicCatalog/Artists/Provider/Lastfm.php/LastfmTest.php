<?php

namespace CatalogBundle\Tests\Library\MusicCatalog\Artists\Provider\Lastfm;

use MusicCatalog\Artists\Provider\Lastfm\Lastfm;

/**
 * @group integration
 */
class LastfmTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTopTracks() {
        $request = (new \MusicCatalog\Factory())->getHttpRequestInstance();
        $config =  ["api_key" => "d966f2c28ce75500c752e809943eac39", "artists" => ["toptracks" => ["url" => ["json" => "http://ws.audioscrobbler.com/2.0/"]]]];
        $provider = new Lastfm($config, $request);
        $response = $provider->getTopTracks('Adele');
        $this->assertInstanceOf('\MusicCatalog\Artists\Provider\Lastfm\Response', $response);
    }
}