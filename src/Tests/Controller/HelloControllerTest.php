<?php

namespace Tests\Controller;

use App\Application;
use Silex\WebTestCase;

class HelloControllerTest extends WebTestCase
{
    public function createApplication()
    {
        return new Application('test');
    }

    public function testcgetUsers()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $data = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('message', $data);
        $this->assertArrayHasKey('_links', $data);
        $this->assertArrayHasKey('self', $data['_links']);
        $this->assertArrayHasKey('users', $data['_links']);
    }
}
