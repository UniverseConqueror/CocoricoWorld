<?php

namespace App\DataFixtures;

use App\DataFixtures\Provider\Univers\FruitLegumeProvider;
use App\Entity\Category;
use App\Entity\Subcategory;
use App\Entity\Univers;
use Doctrine\Common\Persistence\ObjectManager;

class UniversFixture extends BaseFixture
{
    /**
     * @var object[]
     */
    private $universProviders = [
        FruitLegumeProvider::class,
    ];

    public function loadData(ObjectManager $manager)
    {
        foreach ($this->universProviders as $provider) {

            $universInfos = $provider::getUnivers();
            $univers = new Univers();
            $univers->setName($universInfos['name'])
                ->setImage($universInfos['image']);

            $manager->persist($univers);

            $categories = $provider::getCategories();
            foreach ($categories as $cat) {

                $category = new Category();
                $category->setName($cat['name'])
                    ->setImage($cat['image'])
                    ->setUnivers($univers);

                $manager->persist($category);

                $subCategories = $provider::getSubcategories()[$cat['name']];
                foreach ($subCategories as $subCat) {

                    $subcategory = new Subcategory();
                    $subcategory->setName($subCat['name'])
                        ->setCategory($category);

                    $manager->persist($subcategory);
                }
            }
        }

        $manager->flush();
    }
}
