<?php

namespace Lushc\MinCommerce\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    /**
     * Find all products which are featured for promotion
     * @return array A collection of products
     */
    public function findAllFeatured()
    {
        return $this->getEntityManager()
                    ->createQuery(
                        'SELECT p FROM MinCommerceSiteBundle:Product p
                        WHERE p.isFeatured = 1'
                    )
                    ->getResult();
    }
}