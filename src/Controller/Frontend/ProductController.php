<?php
namespace App\Controller\Frontend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Producer;
use App\Repository\ProductRepository;
use Doctrine\Common\Persistence\ObjectManager;

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

   /**
     * @Route("product/disable/{id<\d+>}", name = "disable_product")
     */
    public function enable_disable_product(Product $product, ObjectManager $manager)
    {
        if ($product->getEnable($product) == true) {
            $product->setEnable(false);
            $manager->persist($product);
            $manager->flush();

            $this->addFlash(
                'product blocked',
                'La produit a bien été archivé'
            );
        } else {
            $product->setEnable(true);
            $manager->persist($product);
            $manager->flush();

            $this->addFlash(
                'product debloquée',
                'Le produit a bien été debloquée'
            );
        }
        return $this->redirectToRoute('producer_profil', [
            'id' => $product->getProducer()->getId()
        ]);
    }
}