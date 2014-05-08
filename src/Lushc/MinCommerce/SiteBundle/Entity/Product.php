<?php

namespace Lushc\MinCommerce\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="Lushc\MinCommerce\SiteBundle\Repository\ProductRepository")
* @ORM\Table(name="product")
*/
class Product
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @var int
    */
    protected $id;

    /**
    * @ORM\Column(type="string", length=150)
    * @var string
    */
    protected $name;

    /**
    * @ORM\Column(type="text")
    * @var string
    */
    protected $description;

    /**
    * @ORM\Column(type="decimal", scale=2)
    * @var string
    */
    protected $price;

    /**
    * @ORM\Column(type="boolean")
    * @var boolean
    */
    protected $isFeatured = false;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param  string  $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param  string  $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param  string  $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set isFeatured
     *
     * @param  boolean $isFeatured
     * @return Product
     */
    public function setIsFeatured($isFeatured)
    {
        $this->isFeatured = $isFeatured;

        return $this;
    }

    /**
     * Get isFeatured
     *
     * @return boolean
     */
    public function getIsFeatured()
    {
        return $this->isFeatured;
    }
}
