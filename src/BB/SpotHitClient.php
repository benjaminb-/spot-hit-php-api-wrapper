<?php

namespace BB;

use GuzzleHttp\Client;

class SpotHitClient
{

    const BASE_URL = "https://www.spot-hit.fr/";
    const POST_METHOD = "post";
    const GET_METHOD = "get";
    const SMS_PREMIUM = "premium";
    const SMS_LOWCOST = "lowcost";

    private $apiKey;

    private $client;

    public function __construct($apiKey = "")
    {
        $this->apiKey = $apiKey;
        $this->client = new Client(array(
            "base_uri" => self::BASE_URL
        ));
    }

    private function constructMethod($resource)
    {
        return strtoupper($resource[0]);
    }

    private function constructUrl($resource)
    {
        return $resource[1] . "?key=" . $this->apiKey;
    }

    private function parseResponse($response)
    {
        return \json_decode($response->getBody()->getContents(), true);
    }

    public function call($resource, array $data = [])
    {
        $response = $this->client->request(
            $this->constructMethod($resource),
            $this->constructUrl($resource),
            array("form_params" => $data)
        );
        return $this->parseResponse($response);
    }

}