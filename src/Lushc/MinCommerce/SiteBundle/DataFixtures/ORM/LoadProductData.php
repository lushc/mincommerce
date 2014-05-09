<?php

namespace Lushc\MinCommerce\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Lushc\MinCommerce\SiteBundle\Entity\Product;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setCategory($this->getReference('category-0'));
        $product->setName('Spigen SGP Neo Hybrid Case for Samsung Galaxy S5');
        $product->setDescription('Preserve the super-sleek profile of your awesome Samsung Galaxy S5 while giving it maximum protection with this blue Neo Hybrid case from Spigen.');
        $product->setPrice(19.99);
        $product->setStockCode('p44240');
        $product->setIsFeatured(true);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-1'));
        $product->setName('HTC One M8 Dot View Flip Case');
        $product->setDescription('Keep your case closed and still receive notifications with this grey official HTC One M8 Dot View case. Featuring full front and rear protection.');
        $product->setPrice(34.99);
        $product->setStockCode('p43670');
        $manager->persist($product);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        // load products after categories
        return 2;
    }
}
