<?php

namespace Lushc\MinCommerce\SiteBundle\Tests\Repository;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class CategoryRepositoryTest extends WebTestCase
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

    public function testFindAllTopLevel()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // find all top level categories
        $repository = $this->em->getRepository('MinCommerceSiteBundle:Category');
        $topLevelCategories = $repository->findAllTopLevel();

        // assert that at least one top level category was returned
        $this->assertGreaterThan(
            0,
            count($topLevelCategories),
            'No top level categories were found'
        );
    }

    public function testFindOneChildBySlug()
    {
        // populate test database
        $this->loadFixtures(array(
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadCategoryData',
            'Lushc\MinCommerce\SiteBundle\DataFixtures\ORM\LoadProductData',
        ));

        // find all top level categories
        $repository = $this->em->getRepository('MinCommerceSiteBundle:Category');
        $category = $repository->findOneChildBySlug('galaxy-s5-cases');

        // assert that the category was returned
        $this->assertNotNull($category, 'Category could not be found');
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
