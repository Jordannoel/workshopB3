<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommercialsControllerTest extends WebTestCase
{
    public function testConnect()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/connect');
    }

}
