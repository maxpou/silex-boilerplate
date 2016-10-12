<?php

namespace Tests\Controller;

use App\Application;
use Silex\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function createApplication()
    {
        return new Application('test');
    }

    public function testCollectionGet()
    {
        $client = static::createClient();
        $client->request('GET', '/users');
        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $data = json_decode($response->getContent(), true);
        $this->assertEquals(4, count($data));
        $this->assertArrayHasKey('id', $data[0]);
        $this->assertArrayHasKey('_links', $data[0]);
        $this->assertArrayHasKey('self', $data[0]['_links']);
    }

    public function testGet()
    {
        $client = static::createClient();
        $client->request('GET', '/users/2');
        $response = $client->getResponse();

        $this->assertEquals(200, $response->getStatusCode(), $response->getContent());

        $data = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('id', $data);
        $this->assertArrayHasKey('first_name', $data);
        $this->assertArrayHasKey('last_name', $data);
        $this->assertArrayHasKey('_links', $data);
        $this->assertArrayHasKey('self', $data['_links']);

        $this->assertEquals('2', $data['id']);
        $this->assertEquals('Peter', $data['first_name']);
        $this->assertEquals('PARKER', $data['last_name']);
    }

    public function testGet404()
    {
        $client = static::createClient();
        $client->request('GET', '/users/2222');
        $response = $client->getResponse();

        $this->assertEquals(404, $response->getStatusCode(), $response->getContent());
    }
}
