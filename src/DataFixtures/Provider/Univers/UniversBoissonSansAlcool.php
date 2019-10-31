<?php

namespace App\DataFixtures\Provider\Univers;

use Faker\Provider\Base;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\Categories\CategoryBoissonSansAlcoolProvider;
use App\DataFixtures\Provider\Subcategories\BoissonSansAlcool\SubCategoryJusdefruitProvider;
use App\DataFixtures\Provider\Subcategories\BoissonSansAlcool\SubCategoryGazeuxProvider;
use App\DataFixtures\Provider\Subcategories\BoissonSansAlcool\SubCategoryBioProvider;
use Faker;
use App\Entity\Univers;
use App\Entity\Category;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;


abstract class UniversBoissonSansAlcool extends Fixture
{
    public static function loadunivers(ObjectManager $manager)
    {

    // Paramétrage de Faker pour générer des données en fr
        $faker = Faker\Factory::create('fr_FR');

        $universes = [];
        $categories = [];
        $subcategories = [];

        // Création de l'Univers Boisson sans alcool
      
        $univers =  new Univers();
        $univers    ->setName('Boisson Sans Alcool')
                    ->setImage('boissons-sans-alcool.jpg')
                    ->setCreatedAt(new \DateTime());

        $manager    ->persist($univers);
        $universes[] = $univers;
        
        // Créer les Categories de l'univers boisson sans alcool
            
        $provcategoriesarray = CategoryBoissonSansAlcoolProvider::categories();
        $images = CategoryBoissonSansAlcoolProvider::images();
  
        for ($i = 0 ; $i <= count($provcategoriesarray)-1 ; $i++) {
            $category = new Category();
                    
            $cat = $provcategoriesarray[$i];
                    
            $category   ->setName($cat)
                        ->setImage($images[$i])
                        ->setUnivers($univers);

            $manager->persist($category);
            $categories [] = $category;
       


            
            // Créer les SubCategories de l'univers Fruits et Légumes

            //Implémentation d'un tableau de Subcategories de la Category concernée
            $provsubcategoriesarrays = [SubCategoryJusdefruitProvider::categories(), SubCategoryGazeuxProvider::categories(), SubCategoryBioProvider::categories()];
                               
           
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


    
