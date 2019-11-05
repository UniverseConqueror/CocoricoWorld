<?php
namespace App\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProductType;
use Symfony\Component\HttpFoundation\Response;
use App\Service\FileUploader;
use Doctrine\Common\Persistence\ObjectManager;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id<\d+>}",
     *     name="product_show",
     *     methods={"GET"})
     *
     * @param ProductRepository $productRepository
     * @param Product|null      $product
     *
     * @return Response
     */
   public function show(ProductRepository $productRepository, Product $product = null)
   {
       if (!$product) {

           throw $this->createNotFoundException('La page que vous recherchez n\'existe pas !');
       }
       $producer = $product->getProducer();
       $products = $productRepository->findBy(array('producer' => $producer), array(), 5);

       return $this->render('frontend/product/show.html.twig', [
           'product'          => $product,
           'product_producer' => $products
       ]);
   }

    /**
     * @Route("/product/new",
     *     name="product_new",
     *     methods={"GET","POST"})
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */

   public function new(Request $request)
   {
       if (!$producer = $this->getUser()->getProducer()) {

           throw $this->createAccessDeniedException('Vous devez être producteur pour accéder à cette page !');
       }
       $product = new Product();
       $productForm = $this->createForm(ProductType::class, $product);
       $productForm->handleRequest($request);

       if ($productForm->isSubmitted() && $productForm->isValid()) {
           $product->setProducer($producer);
           $manager = $this->getDoctrine()->getManager();
           $manager->persist($product);
           $manager->flush();

           $this->addFlash(
               'success',
               'Votre produit a bien été enregistré'
           );

           return $this->redirectToRoute('product_show', [
               'id' => $product->getId(),
           ]);
       }

       return $this->render('/frontend/product/new.html.twig', [
           'product' => $product,
           'form'    => $productForm->createView()
       ]);
   }

    /**
     * @Route("/product/{id<\d+>}/edit",
     *     name="product_edit",
     *     methods={"GET","POST"})
     *
     * @param Request      $request
     * @param Product|null $product
     *
     * @return RedirectResponse|Response
     */
    public function edit(Request $request, Product $product = null)
    {
        if (!$product) {

            throw $this->createNotFoundException('La page que vous recherchez n\'existe pas !');
        }
        $productForm = $this->createForm(ProductType::class, $product);
        $productForm->handleRequest($request);

        if ($productForm->isSubmitted() && $productForm->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            $this->addFlash(
                'info',
                'Mise à jour effectuée'
            );

            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()
            ]);
        }

        return $this->render('frontend/product/edit.html.twig', [
            'product' => $product,
            'form'    => $productForm->createView(),
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