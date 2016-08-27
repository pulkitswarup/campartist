<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group functional
 */
class ListingControllerTest extends WebTestCase
{
    private $client;

    public function setUp() {
        $this->client = static::createClient();
    }

    public function testResultsActionAllowedMethod() {
        $this->client->request('GET', '/geo/india');
        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
        
        $this->client->request('POST', '/geo/india');
        $this->assertEquals('200', $this->client->getResponse()->getStatusCode());
    }

    public function testIndexActionDisallowedMethod() {
        $this->client->request('PUT', "/geo/india");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
        
        $this->client->request('DELETE', "/geo/india");
        $this->assertEquals('405', $this->client->getResponse()->getStatusCode());
    }

    /**
     * @dataProvider countryProvider
     */
    public function testResultsAction($input, $output) {
        $this->client->request('GET', '/geo/'.$input);
        $this->assertContains('Popular Artists In ' . $output, $this->client->getResponse()->getContent());
    }

    public function testResultsActionNoResultsFound() {
        $this->client->request('GET', '/geo/asasas');
        $this->assertContains('No Results Found', $this->client->getResponse()->getContent());
    }

    /**
     * @dataProvider countryProvider
     */
    public function testResultsActionPagination($input, $output) {
        $this->client->request('GET', '/geo/' . $input . '/2');
        $this->assertContains('Popular Artists In ' . $output, $this->client->getResponse()->getContent());
    }

    public function countryProvider() {
        return [
            ['india', 'India'],
            ['united states', 'United States'],
            ['japan', 'Japan'],
            ['china', 'China']
        ];
    }
    public function tearDown() {
        $this->client = null;
    }
}
