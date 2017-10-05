<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequirementsControllerTest extends WebTestCase
{
    public function testGetrequirements()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getRequirements');
    }

    public function testPostrequirements()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postRequirements');
    }

}
