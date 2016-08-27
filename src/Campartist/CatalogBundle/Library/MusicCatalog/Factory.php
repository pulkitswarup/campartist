<?php

namespace MusicCatalog  ;

use MusicCatalog\Request;

class Factory {
    
    public static $version = "1.0.0";

    public function getCollection($type, $provider) {
        try {
            $request = $this->getHttpRequestInstance();
            $factory = "\\MusicCatalog\\$type\\Factory";
            return new $factory($provider, $request);
        } catch(\Exception $e) {
            throw new \InvalidArgumentException('Invalid catalog type : ' . $type);
        }
    }

    public function getHttpRequestInstance() {
        return new Request();
    }
}