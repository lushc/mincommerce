<?php

namespace Lushc\MinCommerce\SiteBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

class ProductControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = static::createClient();
    }

    public function testShowProduct()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // request a category page
        $crawler = $this->client->request('GET', '/spigen-sgp-neo-hybrid-case-for-samsung-galaxy-s5-p44240');

        // assert that the request was successful
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        // assert that there is a product description
        $this->assertCount(
            1,
            $crawler->filter('.product-description p:contains("Preserve the super-sleek profile of your awesome Samsung Galaxy S5 while giving it maximum protection with this blue Neo Hybrid case from Spigen.")'),
            'The product description is missing or incorrect'
        );

        //assert that there is at least one product image
        $this->assertGreaterThan(
            0,
            $crawler->filter('.thumbnails img')->count(),
            'No product images are displayed'
        );

        // assert that there is a price
        $this->assertCount(
            1,
            $crawler->filter('.price:contains("£19.99")'),
            'The product price is missing or incorrect'
        );
    }
}
