<?php

namespace Lushc\MinCommerce\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoryController extends Controller
{
    /**
    * @Route("/{slug}", name="category_show")
    * @Template()
    */
    public function showAction($slug)
    {
        $repository = $this->getDoctrine()->getRepository('MinCommerceSiteBundle:Category');
        $category = $repository->findOneBySlug($slug);

        return array(
            'category' => $category,
        );
    }
}
