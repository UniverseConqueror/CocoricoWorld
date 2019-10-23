<?php
namespace App\Controller\Frontend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Producer;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
   /**
    * @Route("/product/{id<\d+>}", name="product_show", methods={"GET"})
    */
   public function show(Product $product, ProductRepository $productRepository)
   {
       $producer = $product->getProducer();
       $products = $productRepository->findBy(array('producer' => $producer), array(), 5);

       
       if (!$product) {
           throw $this->createNotFoundException('Producteur introuvable');
       }
       return $this->render('frontend/product/show.html.twig', [
           'product' => $product,
           'product_producer'=> $products
       ]);
   }
}