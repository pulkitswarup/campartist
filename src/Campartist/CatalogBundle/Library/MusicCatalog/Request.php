<?php

namespace MusicCatalog;

use Httpful\Request AS HttpfulRequest;
use MusicCatalog\Http\HttpInterface;

class Request implements HttpInterface {
    public function get($uri) {
        return HttpfulRequest::get($uri)->expectsJson()->send();
    }
}