<?php

namespace MusicCatalog\Geo\Adaptor;

interface GeoInterface {
    
    public function getTopArtists($country, $page = 1, $limit = 5, $format = 'json');

    public function getTopTracks();
}