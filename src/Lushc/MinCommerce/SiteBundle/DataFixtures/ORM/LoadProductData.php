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
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('Spigen SGP Neo Hybrid Case for Samsung Galaxy S5');
        $product->setDescription('Preserve the super-sleek profile of your awesome Samsung Galaxy S5 while giving it maximum protection with this blue Neo Hybrid case from Spigen.');
        $product->setPrice(19.99);
        $product->setStockCode('p44240');
        $product->setIsFeatured(true);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('Spigen Ultra Fit Capsule Case for Samsung Galaxy S5 - Grey');
        $product->setDescription('Protect your Samsung Galaxy S5 without affecting the dynamics of the design with this grey, slim Ultra Fit Capsule case from Spigen SGP.');
        $product->setPrice(14.99);
        $product->setStockCode('p44221');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('Official Samsung Galaxy S5 S-View Premium Cover Case - Blue Black');
        $product->setDescription('Ideal for checking the time or screening and answering incoming calls without opening the case. This blue black official Samsung S-View Cover for the Samsung Galaxy S5 is slim and stylish.');
        $product->setPrice(39.99);
        $product->setStockCode('p44029');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('Official Samsung Galaxy S5 Flip Wallet Cover - Blue Topaz');
        $product->setDescription('Protect your Samsung Galaxy S5 screen from harm and keep your most vital cards close to hand with the official blue topaz flip wallet cover from Samsung.');
        $product->setPrice(29.99);
        $product->setStockCode('p44020');
        $product->setIsFeatured(true);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('Draco Galaxy S5 Supernova S5 Aluminium Bumper - Electric Blue');
        $product->setDescription('Give your Samsung Galaxy S5 the ultimate style and protection with this Supernova S5 Aircraft grade aluminium bumper in blue by Draco.');
        $product->setPrice(60.00);
        $product->setStockCode('p44866');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('Official Samsung Galaxy S5 S-View Premium Cover Case - Rose Gold');
        $product->setDescription('Ideal for checking the time or screening and answering incoming calls without opening the case. This Rose Gold official Samsung S-View Cover for the Samsung Galaxy S5 is slim and stylish.');
        $product->setPrice(29.99);
        $product->setStockCode('p44032');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('ArmourDillo Hybrid Protective Case for Samsung Galaxy S5 - Blue');
        $product->setDescription('Protect your Samsung Galaxy S5 with this blue ArmourDillo Case, comprised of an inner TPU case and an outer impact resistant exoskeleton.');
        $product->setPrice(12.99);
        $product->setStockCode('p44300');
        $product->setIsFeatured(true);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('Official Samsung Galaxy S5 Flip Wallet Cover - White');
        $product->setDescription('Protect your Samsung Galaxy S5 screen from harm and keep your most vital cards close to hand with the official white flip wallet cover from Samsung.');
        $product->setPrice(19.99);
        $product->setStockCode('p44021');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('ROCK Elegant Samsung Galaxy S5 Smart View Flip Case - Blue');
        $product->setDescription('The Elegant Side Flip case in blue from Rock is an ultra thin flip case that integrates a smart-view window, which allows you to see and answer messages and calls without having to open your case.');
        $product->setPrice(14.99);
        $product->setStockCode('p44668');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-Samsung Galaxy-1'));
        $product->setName('ROCK Elegant Samsung Galaxy S5 Smart View Flip Case - Pink');
        $product->setDescription('The Elegant Side Flip case in pink from Rock is an ultra thin flip case that integrates a smart-view window, which allows you to see and answer messages and calls without having to open your case.');
        $product->setPrice(14.99);
        $product->setStockCode('p44672');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('HTC One M8 Dot View Flip Case');
        $product->setDescription('Keep your case closed and still receive notifications with this grey official HTC One M8 Dot View case. Featuring full front and rear protection.');
        $product->setPrice(34.99);
        $product->setStockCode('p43670');
        $product->setIsFeatured(true);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('Flexishield Case for HTC One M8 - 100% Clear');
        $product->setDescription('Crystal case like protection with the durability of a silicone case for the HTC One M8. This case is 100% clear, preserving all the great style of your HTC One M8.');
        $product->setPrice(4.99);
        $product->setStockCode('p44492');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('ArmourDillo Hybrid Protective Case for HTC One M8 - Red');
        $product->setDescription('Protect your HTC One M8 with this red ArmourDillo Case, comprised of an inner TPU case and an outer impact resistant exoskeleton.');
        $product->setPrice(12.99);
        $product->setStockCode('p44559');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('Spigen Slim Armor HTC One M8 Case - Gun Metal');
        $product->setDescription('The Slim Armour case for the HTC One M8 in gun metal has shock absorbing technology specifically incorporated to protect the device from any angle.');
        $product->setPrice(19.99);
        $product->setStockCode('p44925');
        $product->setIsFeatured(true);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('The Ultimate HTC One M8 Accessory Pack');
        $product->setDescription('The ultimate HTC One M8 accessory pack contains must have items for your One. Designed to protect and store your HTC One M8 at home, in the office and in the car.');
        $product->setPrice(19.99);
        $product->setStockCode('p44665');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('Official HTC One M8 Double Dip Hard Shell - Grey and Red');
        $product->setDescription('Protect your HTC One M8 from bumps, scrapes and drops with this tough polycarbonate shell case in red and grey. As it\'s an official accessory, all cut-outs for accessing and using the device are perfectly placed.');
        $product->setPrice(19.99);
        $product->setStockCode('p43660');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('Official HTC One M8 Flip Case - White');
        $product->setDescription('Protect your HTC One M8 from bumps, scrapes and drops with this quality flip case in white. As it\'s an official accessory, all cut-outs for accessing and using the device are perfectly placed.');
        $product->setPrice(12.99);
        $product->setStockCode('p43677');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('Case-Mate Barely There for HTC One M8 - Clear');
        $product->setDescription('For those who prefer nothing to come between them and their HTC One M8, this protective \'Barely There\' black case by Case-Mate is for you - in clear.');
        $product->setPrice(14.99);
        $product->setStockCode('p43983');
        $product->setIsFeatured(true);
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('Official HTC One M8 Translucent Hard Shell Case with Screen Protector');
        $product->setDescription('Protect your HTC One M8 from bumps, scrapes and drops with this quality translucent hard shell case. As it\'s an official accessory, all cut-outs for accessing and using the device are perfectly placed and even includes a screen protector.');
        $product->setPrice(12.99);
        $product->setStockCode('p43681');
        $manager->persist($product);

        $product = new Product();
        $product->setCategory($this->getReference('category-HTC-1'));
        $product->setName('Pudini Flip and Stand HTC One M8 Case - Black');
        $product->setDescription('A sophisticated lightweight black textured finish case with a suction cup fastener and built-in stand, for ease of use. Ideal stylish protection for your HTC One M8.');
        $product->setPrice(12.99);
        $product->setStockCode('p44810');
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
