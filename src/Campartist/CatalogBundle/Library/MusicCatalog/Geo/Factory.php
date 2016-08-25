<?php

namespace MusicCatalog\Geo;

class Factory {
    
    private $provider = null;
    private $request  = null;

    public function __construct($provider, $request) {
        $this->provider = $provider;
        $this->request = $request;
    }

    public function getService($config) {
        try{
            $provider = "\\MusicCatalog\\Geo\\Provider\\".$this->provider."\\".$this->provider;
            return new $provider($config, $this->request);
        } catch(\Exception $e) {
            throw new \InvalidArgumentException('Invalid catalog provider (geo) : ' . $this->provider);
        }
    }
}