<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetControllerTest extends WebTestCase
{
    public function testGetIntensitySuccess()
    {
        $httpClient = self::createClient()
            ->getContainer()
            ->get('Symfony\Contracts\HttpClient\HttpClientInterface');

        $result = $httpClient->request('GET', "https://api.carbonintensity.org.uk/intensity");
        $responseStatusCode = $result->getStatusCode();

        $this->assertEquals(200, $responseStatusCode);
    }
}
