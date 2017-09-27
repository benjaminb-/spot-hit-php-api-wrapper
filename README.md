## Requirements

`PHP >= 5.4`

## Installation

``` bash
composer require bb/spot-hit-php-api-wrapper
```

## Usage

``` php
<?php
 
use BB\SpotHitClient;
use BB\SpotHitResources;
 
// array of parameters required by spot-hit (except key)  
// see https://www.spot-hit.fr/documentation-api
$data = array(
    "type" => SpotHitClient::SMS_LOWCOST,
    "destinataires" => "+33600000000",
    "message" => "Hello world."
);
 
$client = new SpotHitClient("YOUR_API_KEY");
$response = $client->call(SpotHitResources::$sendSms, $data);
```