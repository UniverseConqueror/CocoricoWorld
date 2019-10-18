<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures\Provider\UniversProvider;
use App\DataFixtures\Provider\Categories\CategoryFruitsLegumesProvider;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;
use Faker\ORM\Doctrine\Populator;
use App\Entity\Univers;
use App\Entity\Category;
use App\Entity\User;
use App\Entity\Producer;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    // MIse en place de l'encodage du password
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    
    public function load(ObjectManager $manager)
    {
        // Paramétrage de Faker pour générer des données en fr
        $faker = Faker\Factory::create('fr_FR');

        // On donne le Manager de Doctrine à Faker
        $populator = new Faker\ORM\Doctrine\Populator($faker, $manager);

        // On ajoute notre UniversProvider à Faker
        $faker->addProvider(new UniversProvider($faker));

        // Création des 10 Univers

        $populator->addEntity('App\Entity\Univers', 10, array(
            'name' => function () use ($faker) {
                return $faker->unique()->randomUnivers();
            }
                   
        ));

        $insertedEntities = $populator->execute();

        $univers = $insertedEntities['App\Entity\Univers'];
        

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

        //Créer 1 producer

        $producer = new Producer();

        $siretNumber = $faker->siret();
        $postalcode = $this->randomPostalCode();
        $user = new User();

        $producer   ->setUser($user->getId())
                    ->setSocialReason($faker->company())
                    ->setSiretNumber('$siretNumber')
                    ->setAdress($faker->streetAddress())
                    ->setPostalCode($postalcode)
                    ->setCity($faker->city())
                    ->setEmail($faker->email())
                    ->setFirstname($faker->firstName())
                    ->setLastname($faker->lastName())
                    ->setTelephone($faker->mobileNumber())
                    ->setStatus(null)
                    ->setEnable(true)
                    ->setAvatar($faker->url())
                    ->setDescription($faker->sentence($nbWords = 10, $variableNbWords = true))
                    ->setCreatedAt(new \DateTime())
                    ->setUpdatedAt(null);

        $manager->persist($producer);


        // Créer 1 Product

        // $product = new Product();

        // $product    ->setName($faker->sentence($nbWords = 4, $variableNbWords = true))
        //             ->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 40))
        //             ->setWeight($faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 5))
        //             ->setQuantity($faker->numberBetween($min = 0, $max = 50))
        //             ->setCreatedAt(new \DateTime())
        //             ->setUpdatedAt(null)
        //             ->setProducer(null);

        // $manager->persist($product);






        
        $manager->flush();
    }
   
  

    public function randomPostalCode() {
        $postal =mt_rand(100,900) * 100;
        return $postal;
    }
}
