<?php

namespace App\DataFixtures\Provider\Univers;

use Faker\Provider\Base;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\Categories\CategoryEpicerieSaleeProvider;
use App\DataFixtures\Provider\Subcategories\EpicerieSalee\SubCategoryBocauxProvider;
use App\DataFixtures\Provider\Subcategories\EpicerieSalee\SubCategoryHuilesProvider;
use App\DataFixtures\Provider\Subcategories\EpicerieSalee\SubCategorySelPoivreProvider;
use Faker;
use App\Entity\Univers;
use App\Entity\Category;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;


abstract class UniversEpicerieSalee extends Fixture
{
    public static function loadunivers(ObjectManager $manager)
    {

    // Paramétrage de Faker pour générer des données en fr
        $faker = Faker\Factory::create('fr_FR');

        $universes = [];
        $categories = [];
        $subcategories = [];

        // Création de l'Univers Epicerie Salée
      
        $univers =  new Univers();
        $univers    ->setName('Epicerie Salée')
                    ->setCreatedAt(new \DateTime());

        $manager    ->persist($univers);
        $universes[] = $univers;
        
        // Créer les Categories de l'univers Epicerie Salée
            
        $provcategoriesarray = CategoryEpicerieSaleeProvider::categories();
  
        for ($i = 0 ; $i <= count($provcategoriesarray)-1 ; $i++) {
            $category = new Category();
                    
            $cat = $provcategoriesarray[$i];
                    
            $category   ->setName($cat)
                        ->setImage($faker->url())
                        ->setUnivers($univers);

            $manager->persist($category);
            $categories [] = $category;
       


            
            // Créer les SubCategories de l'univers Epicerie Salée

            //Implémentation d'un tableau de Subcategories de la Category concernée
            $provsubcategoriesarrays = [SubCategoryHuilesProvider::categories(), SubCategorySelPoivreProvider::categories(),SubCategoryBocauxProvider::categories()];
                               
           
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