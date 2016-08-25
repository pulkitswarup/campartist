<?php

namespace MusicCatalog\Artists\Provider\Lastfm;

use MusicCatalog\Artists\Provider\Lastfm\Response;
use MusicCatalog\Artists\Adaptor\ArtistsAdaptor;

class Lastfm extends ArtistsAdaptor {
    
    public function getTopTracks($artist,   $page = 1, $limit = 10, $format = "json", $autocorrect = 1) {
        if($format == 'json') {
            $uri = $this->config['artists']['toptracks']['url'][$format] . "?method=artist.gettoptracks&artist=" . $artist . "&api_key=" . $this->config['api_key'] . "&format=" . $format . "&page=" . $page . "&limit=" . $limit . "&autocorrect=" . $autocorrect; 
        } else {
            throw new \InvalidArgumentException('Invalid response format (artists - toptracks) - ' . $format);
        }
        $results = $this->request->get($uri);
        $response = new Response();
        $response->set($results);
        return $response;
    }
}