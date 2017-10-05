<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientsControllerTest extends WebTestCase
{
    public function testGetclients()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getClients');
    }

}
