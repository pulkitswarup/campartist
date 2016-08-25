<?php

namespace MusicCatalog;

class Response {
    protected $data     = null;
    protected $error    = null;
    protected $hasError = false;

    public function set($data, $format = "json") {
        if($format == "json") {
            $this->data = json_decode($data, true);
        }
    }

    public function getData() {
        return $this->data;
    }

    public function getError() {
        return $this->error;
    }

    public function hasError() {
        return $this->hasError;
    }
}