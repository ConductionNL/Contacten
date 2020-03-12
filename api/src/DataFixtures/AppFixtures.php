<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Organization;
use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class AppFixtures extends Fixture
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }
    public function load(ObjectManager $manager)
    {
        if(in_array("huwelijksplanner.online",$this->params->get('app_domains'))) {
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
        if(in_array("larping.eu",$this->params->get('app_domains'))){
            $id = Uuid::fromString('27141158-fde5-4e8b-a2b7-07c7765f0c63');
            $organization = new Organization();
            $organization->setName("Vortex Adventures");
            $organization->setDescription(" ");
            $manager->persist($organization);
            $email = new Email();
            $email->setName("algemene email");
            $email->setEmail('vasecretaris@gmail.com');
            $organization->addEmail($email);
            $manager->persist($email);
            $manager->persist($organization);
            $organization->setId($id);
            $manager->persist($organization);
            $manager->flush();
        }
    }
}
