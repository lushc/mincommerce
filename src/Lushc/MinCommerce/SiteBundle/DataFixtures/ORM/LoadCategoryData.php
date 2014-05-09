<?php

namespace Lushc\MinCommerce\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Lushc\MinCommerce\SiteBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $categories = array(
            'Galaxy S5 Cases',
            'HTC One M8 Accessories',
        );

        foreach ($categories as $key => $value) {
            $category = new Category();
            $category->setName($value);
            $manager->persist($category);
            // make this category available to the product data fixture
            $this->addReference('category-' . $key, $category);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        // load categories first
        return 1;
    }
}
