<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StatusControllerTest extends WebTestCase
{
    public function testGetstatus()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getStatus');
    }

}
