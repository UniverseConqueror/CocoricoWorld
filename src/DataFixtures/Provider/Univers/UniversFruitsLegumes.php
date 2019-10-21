<?php

namespace App\DataFixtures\Provider\Univers;

use Faker\Provider\Base;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\Categories\CategoryFruitsLegumesProvider;
use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryFruitProvider;
use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryLegumeProvider;
use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryHerbeProvider;
use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryLegumeSecProvider;
use Faker;
use App\Entity\Univers;
use App\Entity\Category;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;


abstract class UniversFruitsLegumes extends Fixture
{
    public static function loadunivers(ObjectManager $manager)
    {

    // Paramétrage de Faker pour générer des données en fr
        $faker = Faker\Factory::create('fr_FR');

        $universes = [];
        $categories = [];
        $subcategories = [];

        // Création de l'Univers Fruits et Legumes
      
        $univers =  new Univers();
        $univers    ->setName('Fruits et Legumes')
                    ->setCreatedAt(new \DateTime());

        $manager    ->persist($univers);
        $universes[] = $univers;
        
        // Créer les Categories de l'univers Fruits et Légumes
            
        $provcategoriesarray = CategoryFruitsLegumesProvider::categories();
  
        for ($i = 0 ; $i <= count($provcategoriesarray)-1 ; $i++) {
            $category = new Category();
                    
            $cat = $provcategoriesarray[$i];
                    
            $category   ->setName($cat)
                        ->setImage($faker->url())
                        ->setUnivers($univers);

            $manager->persist($category);
            $categories [] = $category;
       


            
            // Créer les SubCategories de l'univers Fruits et Légumes

            //Implémentation d'un tableau de Subcategories de la Category concernée
            $provsubcategoriesarrays = [SubCategoryFruitProvider::categories(), SubCategoryHerbeProvider::categories(), SubCategoryLegumeProvider::categories(), SubCategoryLegumeSecProvider::categories()];
                               
           
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


    
