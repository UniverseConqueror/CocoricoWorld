<?php

namespace App\DataFixtures\Provider\Univers;

use Faker\Provider\Base;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\Categories\CategoryCharcuterieProvider;
use App\DataFixtures\Provider\Subcategories\Charcuterie\SubCategoryFoieGrasProvider;
use App\DataFixtures\Provider\Subcategories\Charcuterie\SubCategoryJambonsProvider;
use App\DataFixtures\Provider\Subcategories\Charcuterie\SubCategoryPateProvider;
use Faker;
use App\Entity\Univers;
use App\Entity\Category;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;


abstract class UniversCharcuterie extends Fixture
{
    public static function loadunivers(ObjectManager $manager)
    {

    // Paramétrage de Faker pour générer des données en fr
        $faker = Faker\Factory::create('fr_FR');

        $universes = [];
        $categories = [];
        $subcategories = [];

        // Création de l'Univers Charcuterie
      
        $univers =  new Univers();
        $univers    ->setName('Charcuterie')
                    ->setImage('charcuterie.jpg')
                    ->setCreatedAt(new \DateTime());

        $manager    ->persist($univers);
        $universes[] = $univers;
        
        // Créer les Categories de l'univers Charcuterie
            
        $provcategoriesarray = CategoryCharcuterieProvider::categories();
        $images = CategoryCharcuterieProvider::images();
  
        for ($i = 0 ; $i <= count($provcategoriesarray)-1 ; $i++) {
            $category = new Category();
                    
            $cat = $provcategoriesarray[$i];
                    
            $category   ->setName($cat)
                        ->setImage($images[$i])
                        ->setUnivers($univers);

            $manager->persist($category);
            $categories [] = $category;
       


            
            // Créer les SubCategories de l'univers Charcuterie

            //Implémentation d'un tableau de Subcategories de la Category concernée
            $provsubcategoriesarrays = [SubCategoryFoieGrasProvider::categories(), SubCategoryJambonsProvider::categories(), SubCategoryPateProvider::categories()];
                               
           
            $provsubcategoryarray = $provsubcategoriesarrays[$i];

                foreach ($provsubcategoryarray as $key => $value) {
                    $subcategory = new SubCategory();
                
                    $subcategory    ->setName($value)
                                    ->setImage($faker->url())
                                    ->setCategory($category);
                                    // ->addProduct();
                
                    $manager->persist($subcategory);
                    $subcategories[] = $subcategory;
                }
        }
        $manager->flush(); 

        return [
            "subcategories" => $subcategories,
        ];
    }

}