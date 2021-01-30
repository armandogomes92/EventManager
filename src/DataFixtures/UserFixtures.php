<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('alessandro')
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$TnY4ci41aXhWamJ4UHJmQw$zc7BVLwTFj1wjoYQAKLQxnJu4aCdMcnfIFEA1OdDGhQ');
        $manager->persist($user);

        $manager->flush();
    }
}
