<?php

namespace Lushc\MinCommerce\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function categoryMenu(FactoryInterface $factory, array $options)
    {
        $categoryRepository = $this->container->get('doctrine.orm.entity_manager')->getRepository('MinCommerceSiteBundle:Category');
        $categories = $categoryRepository->findAll();

        $menu = $factory->createItem('root');

        foreach ($categories as $key => $category) {
            $menu->addChild($category->getName(), array(
                'route' => 'category_show',
                'routeParameters' => array('slug' => $category->getSlug())
            ));
        }
        // ... add more children

        return $menu;
    }
}
