<?php

namespace CatalogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group functional
 */
class SearchControllerTest extends WebTestCase
{
    private $client;

    public function setUp() {
        $this->client = static::createClient();
    }

    public function testIndexActionAllowedMethod() {
        $this->client->request('GET', '/geo');
        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
    }

    public function testIndexAction() {
        $this->client->request('GET', '/geo');
        $this->assertContains('Be part of the Band', $this->client->getResponse()->getContent());
    }

    public function testIndexActionDisallowedMethod() {
        $this->client->request('POST', "/geo");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
        
        $this->client->request('PUT', "/geo");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
        
        $this->client->request('DELETE', "/geo");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
    }

    public function tearDown() {
        $this->client = null;
    }
}
