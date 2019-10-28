<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\Univers\UniversFruitLegume;
use App\DataFixtures\Provider\Univers\UniversMer;
use App\DataFixtures\Provider\Univers\UniversBoissonAlcool;
use App\DataFixtures\Provider\Univers\UniversViande;
use App\DataFixtures\Provider\Univers\UniversCharcuterie;
use App\DataFixtures\Provider\Univers\UniversBoissonSansAlcool;
use App\DataFixtures\Provider\Univers\UniversFromage;
use App\DataFixtures\Provider\Univers\UniversProduitElabore;
use App\DataFixtures\Provider\Univers\UniversEpicerieSalee;
use App\DataFixtures\Provider\Univers\UniversEpicerieSucree;
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


        // Créer 1 user Admin

        $admin = new User();

        $admin      ->setEmail('admin@admin.com')
                    ->setRoles(['ROLE_ADMIN'])
                    ->setFirstname('admin')
                    ->setLastname('admin')
                    ->setTelephone('03.89.63.25.12')
                    ->setAddress('35 rue des Poiriers')
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

        // Créer 30 users

        //Création d'un tableau de users pour stocker et réutiliser pour lier aux producers
        $users = [];
        for ($i = 0 ; $i <= 29 ; $i++) {
            $user = new User();
            $postal = $this->randomPostalCode();

            $user   ->setEmail($faker->unique()->email())
                    ->setRoles(['ROLE_USER'])
                    ->setFirstname($faker->firstName())
                    ->setLastname($faker->lastName())
                    ->setTelephone($faker->phoneNumber())
                    ->setAddress($faker->streetAddress())
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
        //Créer 10 producer
        
        //Création d'un tableau de producers pour stocker et réutiliser pour lier aux products
        $producers = [];
       
        //Création d'un CP avec notre méthode personnelle.
        $postalcode = $this->randomPostalCode();
      
        for ($i = 0 ; $i <= 9 ; $i++) {
            $producer = new Producer();
            $producer   ->setEmail($faker->unique()->email())
                        ->setSocialReason($faker->company(), $faker->companySuffix())
                        ->setSiretNumber($faker->siret())
                        ->setAddress($faker->streetAddress())
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

        $univers = [
            UniversFruitLegume::loadunivers($manager),
            UniversMer::loadunivers($manager),
            UniversBoissonAlcool::loadunivers($manager),
            UniversCharcuterie::loadunivers($manager),
            UniversEpicerieSalee::loadunivers($manager),
            UniversEpicerieSucree::loadunivers($manager),
            UniversViande::loadunivers($manager),
            UniversBoissonSansAlcool::loadunivers($manager),
            UniversProduitElabore::loadunivers($manager),
            UniversFromage::loadunivers($manager)
        ];

        //Créer 50 Products par Univers
        foreach($univers as $key => $value) {
            //Création d'un tableau de products pour stocker et réutiliser pour lier aux Subcatégories
            $products = [];
            for ($i = 0 ; $i <= 9; $i++) {
                $product = new Product();
                $subcategory = mt_rand(0, count($univers[$key]["subcategories"]) - 1);


                $product    ->setName($faker->sentence($nbWords = 2, $variableNbWords = true))
                    ->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 40))
                    ->setWeight($faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 5))
                    ->setQuantity($faker->numberBetween($min = 0, $max = 50))
                    ->addSubCategory($univers[$key]["subcategories"][$subcategory]);


                // on récupère un nombre aléatoire de producer dans un tableau
                $randomProducer = (array) array_rand($producers, rand(1, count($producers))); // TODO: A corriger, peut provoquer un Undefined Offset
                // on lie un producer à un user
                foreach ($randomProducer as $key => $value) {
                    $product->setProducer($producers[$key]);
                }
                $manager->persist($product);
                $products[] = $product;
            }
        }
        $manager->flush();

    }

    public function randomPostalCode() {
        $postal = mt_rand(100,900) * 100;
        return $postal;
    }
}
