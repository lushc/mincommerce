<?php

namespace Lushc\MinCommerce\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    /**
     * Build a menu of all top-level categories and display their
     * children in a nested dropdown.
     */
    public function categoryMenu(FactoryInterface $factory, array $options)
    {
        // get all top level categories
        $em = $this->container->get('doctrine.orm.entity_manager');
        $categoryRepository = $em->getRepository('MinCommerceSiteBundle:Category');
        $topLevelCategories = $categoryRepository->findAllTopLevel();

        // create a root <ul> element with bootstrap styling
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        foreach ($topLevelCategories as $key => $parent) {
            $name = $parent->getName();
            $children = $parent->getChildren();

            // add each top level category to the root list as a label
            $menu->addChild($name, array('label' => $name))
                 ->setAttribute('dropdown', true);

            foreach ($children as $key => $child) {
                // nest each child with an actual link to its category page
                $menu[$name]->addChild($child->getName(), array(
                    'route' => 'category_show',
                    'routeParameters' => array('slug' => $child->getSlug())
                ));
            }
        }

        return $menu;
    }
}
