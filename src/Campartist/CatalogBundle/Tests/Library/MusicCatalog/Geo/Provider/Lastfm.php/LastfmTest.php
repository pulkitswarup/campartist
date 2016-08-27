<?php

namespace CatalogBundle\Tests\Library\MusicCatalog\Geo\Provider\Lastfm;

use MusicCatalog\Geo\Provider\Lastfm\Lastfm;

/**
 * @group integration
 */
class LastfmTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTopArtist() {
        $request = (new \MusicCatalog\Factory())->getHttpRequestInstance();
        $config =  ["api_key" => "d966f2c28ce75500c752e809943eac39", "geo" => ["topartists" => ["url" => ["json" => "http://ws.audioscrobbler.com/2.0/"]]]];
        $provider = new Lastfm($config, $request);
        $response = $provider->getTopArtists('India');
        $this->assertInstanceOf('\MusicCatalog\Geo\Provider\Lastfm\Response', $response);
    }
}