<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;
use Faker\Factory;
use App\Entity\Company;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des customers
        $faker = Factory::create('fr_FR');

        for($i = 0;$i < 30;$i++)
        {

            $customer = (new Customer())
                ->setFirstname($faker->firstName($gender = null))
                ->setLastname($faker->lastName)
                ->setEmail($faker->email)
                ->setPhone($faker->mobileNumber);

            $manager->persist($customer);
        }

        for($i = 0;$i < 10;$i++)

        {

            $company = (new Company())
                ->setName($faker->company)
                ->setSiret($faker->siret)
                ->setAddress($faker->streetAddress)
                ->setZipCode($faker->postcode)
                ->setCity($faker->city);

            $manager->persist($company);
        }

        $manager->flush();
    }
}
