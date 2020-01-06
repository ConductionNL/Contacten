<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $person = new Person();
        $person->setGivenName('Erik ');
        $person->setAdditionalName('');
        $person->setFamilyName('Hendrik');
        $manager->persist($person);

        $person = new Person();
        $person->setGivenName('Ike  ');
        $person->setAdditionalName('van den');
        $person->setFamilyName('Pol');
        $manager->persist($person);

        $person = new Person();
        $person->setGivenName('Rene ');
        $person->setAdditionalName('');
        $person->setFamilyName('Gulje');
        $manager->persist($person);

        $manager->flush();
    }
}
