<?php
namespace App\Controller\Frontend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Producer;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Response;
use App\Service\FileUploader;
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
   
    /**
     * @Route("/product/{id<\d+>}/edit", name="product_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectManager $manager, Product $product ): Response
    {
        
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash(
                'info',
                'Mise à jour effectuée'
            );

            return $this->redirectToRoute('product_show',['id'=>$product->getId()]);
        }

        return $this->render('frontend/product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
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
                'danger',
                'La produit a bien été archivé'
            );
        } else {
            $product->setEnable(true);
            $manager->persist($product);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le produit a bien été debloquée'
            );
        }
        return $this->redirectToRoute('producer_profil', [
            'id' => $product->getProducer()->getId()
        ]);
    }

     /**
     * @Route("/product/{id}", name="product_delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Product $product): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();

            $this->addFlash(
                'sucess',
                'Suppression effectuée'
            );
        }

        return $this->redirectToRoute('producer_show', [
            'id'=>$product->getProducer()->getId(),
        ]);
    }
}