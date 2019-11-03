<?php

namespace App\DataFixtures;

use App\Entity\Producer;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture implements DependentFixtureInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function loadData(ObjectManager $manager)
    {
        // Creating a user with the admin role
        $admin = new User();
        $admin->setEmail('admin@admin.com')
            ->setRoles(['ROLE_ADMIN'])
        ;
        $passwordHash = $this->encoder->encodePassword($admin, 'nY4KreT5xBT3LSRKsjYR9oiETqxA');
        $admin->setPassword($passwordHash);

        $manager->persist($admin);

        $this->createMany(30, 'main_user', function ($count) {

            $user = new User();
            $user->setEmail(sprintf('user%d@cocorico.fr', $count))
                ->setRoles(['ROLE_USER'])
                ->setFirstname($this->faker->firstName)
                ->setLastname($this->faker->lastName)
                ->setTelephone($this->faker->phoneNumber)
                ->setAddress($this->faker->streetAddress)
                ->setPostalCode($this->faker->numberBetween(1000, 9000) * 10)
                ->setCity($this->faker->city)
            ;
            $passwordHash = $this->encoder->encodePassword($user, 'user');
            $user->setPassword($passwordHash);

            return $user;
        });

        $this->createMany(10, 'main_producer', function($count) {
            $users = $this->getReferences('main_user');

            $producer = new Producer();
            $producer->setEmail($this->faker->unique()->email)
                ->setSocialReason($this->faker->company)
                ->setSiretNumber($this->faker->siret)
                ->setAddress($this->faker->streetAddress)
                ->setPostalCode($this->faker->numberBetween(1000, 9000) * 10)
                ->setCity($this->faker->city)
                ->setFirstname($this->faker->firstName)
                ->setLastname($this->faker->lastName)
                ->setTelephone($this->faker->phoneNumber)
                ->setAvatar('https://i.pravatar.cc/200?u='.$this->faker->numberBetween(0, 100))
                ->setDescription($this->faker->sentence(10, true))
                ->setUser($this->faker->unique()->randomElement($users))
            ;

            return $producer;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            UniversFixture::class,
        ];
    }
}
