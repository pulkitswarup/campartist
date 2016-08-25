<?php

namespace MusicCatalog\Artists\Adaptor;

interface ArtistsInterface {
    public function addTags();
    public function getCorrection();
    public function getInfo();
    public function getSimilar();
    public function getTags();
    public function getTopAlbums();
    public function getTopTags();
    public function getTopTracks($artist,   $page = 1, $limit = 10, $format = "json", $autocorrect = 1);
    public function removeTag();
}