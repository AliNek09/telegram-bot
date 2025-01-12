<?php

namespace App\Services\Core;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Service
{
    private string $baseUrl;

    protected function setBaseUrl(string $baseUrl) : void
    {
        $this->baseUrl = $baseUrl;
    }

    protected function http(): PendingRequest
    {
        return Http::baseUrl($this->baseUrl)->acceptJson(); //WAITING FOR THE BASEE!!!!
    }

    protected function checkResponse($response, $body): void
    {
        if($response->failed()) {
            $this->throw($response, $body); //THROW ERRRRRRRRRROOOOOOOOOORRRRR
        }
    }

    /**
     * @throws Exception
     */
    protected function throw($response, $body)
    {
        $service = explode('\\', get_called_class())[count(explode('\\', get_called_class())) - 1]; //SOMETHING MAGIC HAPPENS HERE
    }
}
