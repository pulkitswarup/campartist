<?php

namespace MusicCatalog\Geo\Provider\Lastfm; 

use MusicCatalog\Geo\Adaptor\GeoInterface; 
use MusicCatalog\Geo\Provider\Lastfm\Response;
use MusicCatalog\Http\HttpInterface;

class Lastfm implements GeoInterface {
    
    private $config;
    private $request;

    public function __construct($config, HttpInterface $request) {
        $this->config = $config;
        $this->request = $request;
    }

    public function getTopArtists($country, $page = 1, $limit = 5, $format = "json") {
        if($format == 'json') {
            $uri = $this->config['geo']['topartists']['url'][$format] . "?method=geo.gettopartists&country=" . $country . "&api_key=" . $this->config['api_key'] . "&format=" . $format . "&page=" . $page . "&limit=" . $limit; 
        } else {
            throw new \InvalidArgumentException('Invalid response format (geo - topartists) - ' . $format);
        }
        $results = $this->request->get($uri);
        $response = new Response();
        $response->set($results);
        return $response;
    }

    public function getTopTracks() {
    }
}