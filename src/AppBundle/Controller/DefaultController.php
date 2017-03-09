<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return array('base_dir' => 'TEST');
    }

    /**
     * @Route("/demo", name="demopage")
     * @Template()
     */
    public function demoAction(Request $request)
    {
        return array('ma_variable' => 'TEST');
    }

    /**
     *@Route("/create", name="demopage")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $product = new Product();
        $product->setName('produit1');
        $product->setPrice('20.50');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);

        $em->flush();

        return array('product' => $product);
    }

    /**
     * @Route("/show", name="showpage")
     * @Template()
     */
    public function showAction()
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Product');
        $products = $repo->findAll();

        return array('products' => $products);
    }
}
