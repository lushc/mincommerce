<?php

namespace Lushc\MinCommerce\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineCollectionAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

class CategoryController extends Controller
{
    /**
    * @Route("/{slug}", name="category_show")
    * @Template()
    */
    public function showAction($slug)
    {
        // get the requested category and its products
        $repository = $this->getDoctrine()->getRepository('MinCommerceSiteBundle:Category');
        $category = $repository->findOneBySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('The requested category does not exist.');
        }

        $products = $category->getProducts();

        // set up pagination
        $pagerfanta = new Pagerfanta(new DoctrineCollectionAdapter($products));
        $pagerfanta->setMaxPerPage(6);

        $request = $this->getRequest();
        $page = (is_numeric($request->query->get('page')) ? (int) $request->query->get('page') : 1);

        try {
            $pagerfanta->setCurrentPage($page);
        }
        catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }

        return array(
            'category' => $category,
            'products' => $pagerfanta,
        );
    }
}
