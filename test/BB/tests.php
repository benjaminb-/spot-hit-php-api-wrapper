<?php

namespace BB;

require __DIR__ . '/../../vendor/autoload.php';

class SpotHitApiTests extends \PHPUnit_Framework_TestCase
{
    const API_KEY = "";
    const SMS_NUMBER = "";
    const EMAIL_ADDRESS = "";

    public function testClientRequiresApiKey()
    {
        $client = new SpotHitClient();
        $response = $client->call(SpotHitResources::$sendSms);
        $this->assertEquals(30, $response["erreurs"]);
    }

    public function testClientResponseShouldReturnSpecificFormat()
    {
        $client = new SpotHitClient(self::API_KEY);
        $response = $client->call(SpotHitResources::$sendEmail);
        $this->assertArrayHasKey("resultat", $response);
        $this->assertArrayHasKey("erreurs", $response);
    }

    public function testResponseShouldBeAndArray()
    {
        $client = new SpotHitClient(self::API_KEY);
        $response = $client->call(SpotHitResources::$sendSms);
        $this->assertTrue(is_array($response));
    }

    public function testClientShouldReturnErrorsIfRequiredDataNotSpecified()
    {
        $client = new SpotHitClient(self::API_KEY);
        $responseNoData = $client->call(SpotHitResources::$sendSms);
        $this->assertContains("1,4,2", $responseNoData["erreurs"]);


        $responseNoType = $client->call(SpotHitResources::$sendSms, array(
            "type" => SpotHitClient::SMS_LOWCOST,
            "destinataires" => self::SMS_NUMBER,
            "message" => "test"
        ));

        var_dump($responseNoType);

    }

    public function testClientShouldSendSMS()
    {
        $client = new SpotHitClient(self::API_KEY);
        $response = $client->call(SpotHitResources::$sendSms);
    }

}