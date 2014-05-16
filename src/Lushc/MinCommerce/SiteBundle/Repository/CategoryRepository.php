<?php

namespace Lushc\MinCommerce\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    /**
     * Find all categories which don't have a parent
     * @return array An array of Category entities
     */
    public function findAllTopLevel()
    {
        return $this->getEntityManager()
                    ->createQuery(
                        'SELECT c FROM MinCommerceSiteBundle:Category c
                        WHERE c.parent IS NULL'
                    )
                    ->getResult();
    }

    /**
     * Find a category which has no parent by its slug
     * @param  string                                        $slug The SEO-friendly name of the category
     * @return \Lushc\MinCommerce\SiteBundle\Entity\Category A Category entity
     */
    public function findOneChildBySlug($slug)
    {
        return $this->getEntityManager()
                    ->createQuery(
                        'SELECT c FROM MinCommerceSiteBundle:Category c
                        WHERE c.slug = :slug AND c.parent IS NOT NULL'
                    )
                    ->setParameter('slug', $slug)
                    ->getOneOrNullResult();
    }
}
