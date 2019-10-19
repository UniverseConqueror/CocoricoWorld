<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\Univers\UniversFruitsLegumes;
// use App\DataFixtures\Provider\UniversProvider;
// use App\DataFixtures\Provider\Categories\CategoryFruitsLegumesProvider;
// use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryFruitProvider;
// use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryLegumeProvider;
// use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryHerbeProvider;
// use App\DataFixtures\Provider\Subcategories\FruitLegume\SubCategoryLegumeSecProvider;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;
use Faker\ORM\Doctrine\Populator;
use App\Entity\Univers;
use App\Entity\Category;
use App\Entity\User;
use App\Entity\Producer;
use App\Entity\Product;
use App\Entity\Subcategory;


class AppFixtures extends Fixture
{
    // Mise en place de l'encodage du password
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    
    public function load(ObjectManager $manager)
    {
        // Paramétrage de Faker pour générer des données en fr
        $faker = Faker\Factory::create('fr_FR');

        // Generation des univers avec les categories et subcategories
      UniversFruitsLegumes::loadunivers($manager);
       

        // Créer 1 user Admin

        $admin = new User();

        $admin      ->setEmail('admin@admin.com')
                    ->setRoles(['ROLE_ADMIN'])
                    ->setFirstname('admin')
                    ->setLastname('admin')
                    ->setTelephone('03.89.63.25.12')
                    ->setAdress('35 rue des Poiriers')
                    ->setPostalCode('25000')
                    ->setCity('Besancon')
                    ->setEnable(true)
                    ->setCreatedAt(new \DateTime())
                    ->setUpdatedAt(null)
                    ;

        // Création d'un password encodé pour admin
        $pw = 'admin';
        $hash =  $this->encoder->encodePassword($admin, $pw);
        $admin      ->setPassword($hash);

        $manager->persist($admin);

        // Créer 10 users

        //Création d'un tableau de users pour stocker et réutiliser pour lier aux producers
        $users = [];
        for ($i = 0 ; $i <= 9 ; $i++) {
            $user = new User();
            $postal = $this->randomPostalCode();

            $user   ->setEmail($faker->unique()->email())
                    ->setRoles(['ROLE_USER'])
                    ->setFirstname($faker->firstName())
                    ->setLastname($faker->lastName())
                    ->setTelephone($faker->phoneNumber())
                    ->setAdress($faker->streetAddress())
                    ->setPostalCode($postal)
                    ->setCity($faker->city())
                          
                    ;

            // Création d'un password encodé pour admin
            $pw = 'user';
            $hash =  $this->encoder->encodePassword($user, $pw);
            $user->setPassword($hash);

            $manager->persist($user);
            $users[] = $user;
        }
        //Créer 1 producer
        
        //Création d'un tableau de producers pour stocker et réutiliser pour lier aux products
        $producers = [];
       
        //Création d'un CP avec notre méthode personnelle.
        $postalcode = $this->randomPostalCode();
      
        for ($i = 0 ; $i <= 4 ; $i++) {
            $producer = new Producer();
            $producer   ->setEmail($faker->unique()->email())
                        ->setSocialReason($faker->company(), $faker->companySuffix())
                        ->setSiretNumber($faker->siret())
                        ->setAdress($faker->streetAddress())
                        ->setPostalCode($postalcode)
                        ->setCity($faker->city())
                        ->setFirstname($faker->firstName())
                        ->setLastname($faker->lastName())
                        ->setTelephone($faker->phoneNumber())
                        ->setStatus(null)
                        ->setAvatar($faker->url())
                        ->setDescription($faker->sentence($nbWords = 10, $variableNbWords = true));
            // on récupère un nombre aléatoire de user dans un tableau
            // $randomUser = (array) array_rand($users, rand(1, count($users)));
            // //on lie un producer à un user
            // foreach ($randomUser as $key => $value) {
                $producer->setUser($users[$i]);
            // }
               
                
            $manager->persist($producer);
            $producers[]= $producer;
        }


        //Créer 10 Product

        //Création d'un tableau de products pour stocker et réutiliser pour lier aux Subcatégories
        $products = [];
        for ($i = 0 ; $i <= 10 ; $i++) {
            $product = new Product();

            $product    ->setName($faker->sentence($nbWords = 4, $variableNbWords = true))
                        ->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 40))
                        ->setWeight($faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 5))
                        ->setQuantity($faker->numberBetween($min = 0, $max = 50));
                   
            // on récupère un nombre aléatoire de user dans un tableau
            $randomProducer = (array) array_rand($producers, rand(1, count($producers)));
            // on lie un producer à un user
            foreach ($randomProducer as $key => $value) {
                $product->setProducer($producers[$key]);
            }

            $manager->persist($product);
            $products[] = $product;
        }
         
        $manager->flush();
    }


    public function randomPostalCode() {
        $postal = mt_rand(100,900) * 100;
        return $postal;
    }

}

