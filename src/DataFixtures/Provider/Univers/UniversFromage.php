<?php

namespace App\DataFixtures\Provider\Univers;

use Faker\Provider\Base;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\Categories\CategoryFromageProvider;
use App\DataFixtures\Provider\Subcategories\Fromage\SubCategoryFromageLaitCruProvider;
use App\DataFixtures\Provider\Subcategories\Fromage\SubCategoryFromagePasteuriseProvider;
use App\DataFixtures\Provider\Subcategories\Fromage\SubCategoryCremerieProvider;
use Faker;
use App\Entity\Univers;
use App\Entity\Category;
use App\Entity\Subcategory;
use Doctrine\Bundle\FixturesBundle\Fixture;


abstract class UniversFromage extends Fixture
{
    public static function loadunivers(ObjectManager $manager)
    {

    // Paramétrage de Faker pour générer des données en fr
        $faker = Faker\Factory::create('fr_FR');

        $universes = [];
        $categories = [];
        $subcategories = [];

        // Création de l'Univers 
      
        $univers =  new Univers();
        $univers    ->setName('Fromage')
                    ->setCreatedAt(new \DateTime());

        $manager    ->persist($univers);
        $universes[] = $univers;
        
        // Créer les Categories de l'univers
            
        $provcategoriesarray = CategoryFromageProvider::categories();
  
        for ($i = 0 ; $i <= count($provcategoriesarray)-1 ; $i++) {
            $category = new Category();
                    
            $cat = $provcategoriesarray[$i];
                    
            $category   ->setName($cat)
                        ->setImage($faker->url())
                        ->setUnivers($univers);

            $manager->persist($category);
            $categories [] = $category;
       


            
            // Créer les SubCategories de l'univers

            //Implémentation d'un tableau de Subcategories de la Category concernée
            $provsubcategoriesarrays = [SubCategoryFromageLaitCruProvider::categories(), SubCategoryFromagePasteuriseProvider::categories(), SubCategoryCremerieProvider::categories()];
                               
           
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