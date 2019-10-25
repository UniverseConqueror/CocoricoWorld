<?php
namespace App\Controller\Frontend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Producer;
use App\Repository\ProductRepository;
use App\Repository\ProducerRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Response;
use App\Service\FileUploader;



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
    * @Route("/product/new", name="product_new", methods={"GET","POST"})
    */

   public function new( Request $request, FileUploader $fileUploader ) : Response 
   {
      
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // on récupère l'image du formulaire
            $image = $form['image']->getData();
            if ($image) {
                // on récupère le nom de l'image saisi dans le formulaire
                $imageName = $fileUploader->upload($image);
                 // on envoi le nom de l'image à la bdd
                $product->setImage($imageName);
            }
            $user = $this->getUser();
            $producer = $user->getProducer();
            $product->setProducer($producer);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            $this->addFlash(
                'success',
                'Votre produit a bien été enregistré'
            );

            return $this->redirectToRoute('producer_show',['id'=>$producer->getId()]);
        }

        return $this->render('/frontend/product/new.html.twig', [
            'product'=>$product,
            'form'=>$form->createView()

        ]);
   }
}