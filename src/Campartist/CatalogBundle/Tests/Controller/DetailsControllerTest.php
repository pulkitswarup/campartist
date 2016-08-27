<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group functional
 */
class DetailsControllerTest extends WebTestCase
{
    private $client;

    public function setUp() {
        $this->client = static::createClient();
    }

    public function testListingActionAllowedMethod404NotFound() {
        $this->client->request('GET', '/toptracks');
        $this->assertEquals('404', $this->client->getResponse()->getStatusCode());
    }
    
    public function testListingActionAllowed() {
        $this->client->request('GET', '/toptracks/adele');
        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
    }

    public function testListingActionDisallowedMethod() {
        $this->client->request('POST', "/toptracks/adele");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
        
        $this->client->request('PUT', "/toptracks/adele");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
        
        $this->client->request('DELETE', "/toptracks/adele");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
    }

    /**
     * @dataProvider artistsProvider
     */
    public function testListingAction($input, $output) {
        $this->client->request('GET', '/toptracks/'.$input);
        $this->assertContains('Top Tracks by ' . $output, $this->client->getResponse()->getContent());
    }

    public function testListingActionNoResultsFound() {
        $this->client->request('GET', '/geo/asasas');
        $this->assertContains('No Results Found', $this->client->getResponse()->getContent());
    }

    /**
     * @dataProvider artistsProvider
     */
    public function testListingActionPagination($input, $output) {
        $this->client->request('GET', '/toptracks/' . $input . '/2');
        $this->assertContains('Top Tracks by ' . $output, $this->client->getResponse()->getContent());
    }

    public function artistsProvider() {
        return [
            ['adele', 'Adele'],
            ['coldplay', 'Coldplay'],
            ['lana del rey', 'Lana Del Rey'],
        ];
    }

    public function tearDown() {
        $this->client = null;
    }
}
