<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("test1@gmail.com");
        $user->setPassword("password");
        $user->setPhone("123456789");

        $manager->persist($user);
        $manager->flush();
    }
}
