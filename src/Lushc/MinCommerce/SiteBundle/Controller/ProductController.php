<?php

namespace Lushc\MinCommerce\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProductController extends Controller
{
    /**
    * @Route("/{slug}", name="product_show")
    * @Template()
    */
    public function showAction($slug)
    {
        $repository = $this->getDoctrine()->getRepository('MinCommerceSiteBundle:Product');
        $product = $repository->findOneBySlug($slug);

        if (!$product) {
            throw $this->createNotFoundException('The requested product does not exist.');
        }

        return array(
            'product' => $product,
        );
    }
}
