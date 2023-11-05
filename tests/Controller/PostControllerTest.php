<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testFilterRegionalSuccess()
    {
        $httpClient = self::createClient()
            ->getContainer()
            ->get('Symfony\Contracts\HttpClient\HttpClientInterface');

        $region = 'england';

        $result = $httpClient->request('GET', "https://api.carbonintensity.org.uk/regional/$region");
        $responseStatusCode = $result->getStatusCode();

        $this->assertEquals(200, $responseStatusCode);
    }

    public function testFilterRegionalApiError()
    {
    
        $httpClient = self::createClient()
            ->getContainer()
            ->get('Symfony\Contracts\HttpClient\HttpClientInterface');

        $region = 'error';

        $result = $httpClient->request('GET', "https://api.carbonintensity.org.uk/regional/$region");
        $responseStatusCode = $result->getStatusCode();

        $this->assertEquals(400, $responseStatusCode);
    }
}
