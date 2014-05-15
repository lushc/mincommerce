<?php

namespace Lushc\MinCommerce\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
    * @Route("/", name="home")
    * @Template()
    */
    public function indexAction()
    {
        $productRepository = $this->getDoctrine()->getRepository('MinCommerceSiteBundle:Product');

        return array(
            'featured_products' => $productRepository->findAllFeatured(),
        );
    }
}
