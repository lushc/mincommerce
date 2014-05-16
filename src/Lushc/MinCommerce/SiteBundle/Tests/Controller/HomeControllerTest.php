<?php

namespace Lushc\MinCommerce\SiteBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = static::createClient();
    }

    public function testFeaturedProducts()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // request the homepage
        $crawler = $this->client->request('GET', '/');

        // assert that there is at least one featured product displayed
        $this->assertGreaterThan(
            0,
            $crawler->filter('.marketing-product')->count(),
            'No featured products could be found'
        );
    }

    public function testWithNoFixtures()
    {
        // create an empty database
        $this->loadFixtures(array());

        // request the homepage
        $crawler = $this->client->request('GET', '/');

        // assert that there is no fatal error
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testCategoryNavigation()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // request the homepage
        $crawler = $this->client->request('GET', '/');

        // browse to the test category
        $categoryName = 'Galaxy S5 Cases';
        $link = $crawler->selectLink($categoryName)->link();
        $crawler = $this->client->click($link);

        // assert that the request was successful
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        // asset that we are on the right category page
        $this->assertCount(
            1,
            $crawler->filter('h1:contains("' . $categoryName . '")'),
            'The h1 for "' . $categoryName . '" could not be found'
        );
    }
}
