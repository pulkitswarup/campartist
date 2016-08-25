<?php

namespace MusicCatalog\Geo\Provider\Lastfm;

use MusicCatalog\Geo\Provider\Lastfm\Constants;
use MusicCatalog\Response AS CatalogReponse;

class Response extends CatalogReponse {
    
    public function set($data, $format = "json") {
        if($format == "json") {
            $data = json_decode($data, true);
            if(isset($data['error'])) { // Error
                $this->error = $this->handleError($data['error']);
            } else if(isset($data['topartists']['artist'])) { // Results & No Results
                $this->data['country']       = $data['topartists']['@attr']['country'];
                $this->data['page']       = $data['topartists']['@attr']['page'];
                $this->data['rpp']        = $data['topartists']['@attr']['perPage'];
                $this->data['totalPages'] = $data['topartists']['@attr']['totalPages'];
                $this->data['total']      = $data['topartists']['@attr']['total'];
                $this->data['artists']    = $data['topartists']['artist'];
            }
        }
    }

    private function handleError($code) {
        switch ($code) {
            case Constants::INVALID_SERVICE:
                return "This service does not exists";
            case Constants::INVALID_METHOD:
                return "No method with that name in this package";
            case Constants::AUTHENTICATION_FAILED:
                return "You do not have permissions to access the service";                
            case Constants::INVALID_FORMAT:
                return "This service doesn't exist in that format";                
            case Constants::INVALID_PARAMETERS:
                return "Your request is missing a required parameter";
            case Constants::INVALID_RESOURCES:
                return "Invalid resource specified";
            case Constants::OPERATION_FAILED:
                return "Something else went wrong";
            case Constants::INVALID_SESSION_KEY:
                return "Please re-authenticate";
            case Constants::INVALID_API_KEY:
                return "You must be granted a valid key by last.fm";
            case Constants::SERVICE_OFFLINE:
                return "This service is temporarily offline. Try again later.";                
            case Constants::INVALID_METHOD_SIGNATURE:
                return "Invalid method signature supplied";                
            case Constants::TEMPORARY_ERROR:
                return "There was a temporary error processing your request. Please try again";                
            case Constants::SUSPENDED_API_KEY:
                return "Access for your account has been suspended, please contact Last.fm";
            case Constants::RATE_LIMIT_EXCEEDED:
                return "Your IP has made too many requests in a short period";
            default:
                return "Invalid error code returned";
        }
    }
}