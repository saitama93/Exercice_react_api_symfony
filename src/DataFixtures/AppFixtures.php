<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {

            $category = new Category();

            $category->setTitle($faker->sentence(3));

            $manager->persist($category);

            for ($j = 0; $j < 30; $j++) {

                $product = new Product();

                $product->setTitle($faker->sentence(5))
                    ->setPrice($faker->randomFloat(2, 250, 3000))
                    ->setDescription($faker->sentence(5))
                    ->setCategory($category);

                $manager->persist($product);
            }
        }

        $manager->flush();
    }
}
