<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Group;


class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++)
        {
            $group = new Group();
            $group->setName($faker->company);

            for ($j = 0; $j < 10; $j++)
            {
                $user = new User();
                $user->setFirstName($faker->firstName())
                    ->setLastName($faker->lastName)
                    ->setPassword("bonjour")
                    ->setDescription($faker->text(100))
                    ->setCity($faker->city)
                    ->setPostalcode($faker->postcode)
                    ->setEmail($faker->email)
                    ->setUsername($faker->userName)
                    ->setAddress($faker->address);
                $manager->persist($user);
                $manager->flush();
                $group->addUser($user);
            }
            $manager->persist($group);
            $manager->flush();
        }

    }
}
