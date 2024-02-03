<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('product ' . $i);
            $product->setDescription($this->generateRandomString());
            $product->setPriceExcludingTax(mt_rand(10, 100));
            $product->setValueAddedTax(mt_rand(10, 100));
            $product->setImage('https://via.placeholder.com/150');
            $manager->persist($product);
        }

        $manager->flush();
    }

    private function generateRandomString($length = 200)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
