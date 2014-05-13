<?php

namespace Lushc\MinCommerce\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Lushc\MinCommerce\SiteBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    protected $manager;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->walkThroughCategories(array(
            'Samsung Galaxy' => array(
                'Galaxy S5 Cases',
            ),
            'HTC' => array(
                'HTC One M8 Cases',
            ),
        ));

        $this->manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        // load categories first
        return 1;
    }

    /**
     * Walks through a multi-dimensional array of category names, creating the appropriate
     * entities and persisting them.
     * @param  array  $array    The array to recursively walk through
     * @param  Category $parent The parent entity for the current category
     * @param  string $path     The reference path that makes the category available in other fixtures
     */
    private function walkThroughCategories(array $array, $parent = null, $path = 'category')
    {
        foreach ($array as $k => $v) {

            $category = new Category();

            if (!is_array($v)) {
                // node has no children
                $category->setName($v);
                if ($parent) {
                    $category->setParent($parent);
                }
            }
            else {
                // node has childen in an array, so the key is the category name
                $category->setName($k);
            }

            $this->manager->persist($category);

            // make this category available to the product data fixture
            echo "Adding reference: " . $path . '-' . $k . PHP_EOL;
            $this->addReference($path . '-' . $k, $category);

            if (is_array($v)) {
                // create entities for children with this category as the parent
                $this->walkThroughCategories($v, $category, $path . '-' . $k);
            }
        }
    }
}
