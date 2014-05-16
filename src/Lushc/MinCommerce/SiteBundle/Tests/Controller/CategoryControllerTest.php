<?php

namespace Lushc\MinCommerce\SiteBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

class CategoryControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = static::createClient();
    }

    public function testShowCategory()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // request a category page
        $crawler = $this->client->request('GET', '/cat/galaxy-s5-cases');

        // assert that the request was successful
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        // assert that the category is showing products
        $this->assertGreaterThan(
            0,
            $crawler->filter('.category-product')->count(),
            'No products were displayed on the category page'
        );
    }

    public function testInvalidCategory()
    {
        // create an empty database
        $this->loadFixtures(array());

        // request a non-existent category page
        $crawler = $this->client->request('GET', '/cat/foo');

        // assert that a 404 response is given
        $this->assertTrue($this->client->getResponse()->isNotFound());
    }

    public function testProductDisplay()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // request a category page
        $crawler = $this->client->request('GET', '/cat/galaxy-s5-cases');

        // assert that our test product is available
        $productName = 'Spigen SGP Neo Hybrid Case for Samsung Galaxy S5';
        $this->assertCount(
            1,
            $crawler->filter('.product-title:contains("' . $productName . '")'),
            'No elements containing product title "' . $productName . '" could be found'
        );

        // go to the product page
        $link = $crawler->selectLink($productName)->link();
        $crawler = $this->client->click($link);

        // assert that the request was successful
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        // asset that we are on the right product page
        $this->assertCount(
            1,
            $crawler->filter('h1:contains("' . $productName . '")'),
            'The h1 for "' . $productName . '" could not be found'
        );
    }

    public function testProductPagination()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // request a category page
        $crawler = $this->client->request('GET', '/cat/galaxy-s5-cases');

        // store the name of the products that appear on page 1
        $firstPageProducts = $crawler->filter('.category-product .product-title')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        // assert that the first page is showing products
        $this->assertGreaterThan(
            0,
            count($firstPageProducts),
            'No products were present on the first category page'
        );

        // go to the next page
        $link = $crawler->selectLink('Next')->link();
        $crawler = $this->client->click($link);

        // assert that the request was successful
        $this->assertTrue($this->client->getResponse()->isSuccessful(), 'The next paginated category could not be accessed by the crawler');

        // store the name of the products that appear on page 2
        $secondPageProducts = $crawler->filter('.category-product .product-title')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        // assert that there are not any duplicate products
        $products = array_merge($firstPageProducts, $secondPageProducts);
        $this->assertFalse(count($products) !== count(array_unique($products)), 'Products from page 1 appeared on page 2');
    }
}