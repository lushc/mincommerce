<?php

namespace Lushc\MinCommerce\SiteBundle\Tests\Repository;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class ProductRepositoryTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()
                    ->get('doctrine')
                    ->getManager();
    }

    public function testFindAllFeatured()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // find all featured products
        $repository = $this->em->getRepository('MinCommerceSiteBundle:Product');
        $featuredProducts = $repository->findAllFeatured();

        // assert that at least one featured product was returned
        $this->assertGreaterThan(
            0,
            count($featuredProducts),
            'No featured products were found'
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}
