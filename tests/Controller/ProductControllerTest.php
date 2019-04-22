<?php

namespace App\Tests\Controller;



use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testGetProductAction()
    {
        $client = static::createClient();

        $client->request('GET', '/api/products');
        $clientResponse = $client->getResponse();
        var_dump(json_decode($clientResponse->getContent()));
        $this->assertEquals(200, $clientResponse->getStatusCode());
    }

//    public function testPostArticleAction()
//    {
//
//    }
}

