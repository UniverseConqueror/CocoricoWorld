<?php
namespace App\Controller\Frontend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UniversRepository;
use App\Repository\CategoryRepository;
use App\Repository\SubcategoryRepository;
class UniversMenusController extends AbstractController
{
    /**
     * @Route("/{type<(subcategory|category)>}/{id<\d+>}", name="univers_menus")
     */
    public function index($id, $type, UniversRepository $universrepository, CategoryRepository $cat, SubcategoryRepository $sub)
    {
        switch ($type) {
            case "subcategory":
                $cat = $sub->find($id);
                break;
            case "category" :
                $cat = $cat->find($id);
                break;
        }
        return $this->render('frontend/univers_menus/show.html.twig', [
            'type' => $cat,
            'typeName' => $type,

        ]);
    }
}