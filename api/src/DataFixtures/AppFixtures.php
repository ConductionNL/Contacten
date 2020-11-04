<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Organization;
use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
        var_dump($this->params->get('app_domain'));
        if (
            $this->params->get('app_domain') == 'huwelijksplanner.online' ||
            strpos($this->params->get('app_domain'), 'huwelijksplanner.online') != false ||
            $this->params->get('app_domain') == 'utrecht.commonground.nu' ||
            strpos($this->params->get('app_domain'), 'utrecht.commonground.nu') != false

        ) {
            $id = Uuid::fromString('95c3da92-b7d3-4ea0-b6d4-3bc24944e622');
            $organization = new Organization();
            $organization->setName('Gemeente Utrecht');
            $organization->setDescription('');
            $manager->persist($organization);
            $organization->setId($id);
            $manager->persist($organization);
            $manager->flush();
            $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=>$id]);

            $email = new Email();
            $email->setName('Algemeen e-mail adres Gemeente Utrecht');
            $email->setEmail('info@utrecht.nl');
            $manager->persist($email);
            $manager->flush();

            $organization->addEmail($email);
            $manager->persist($organization);
            $manager->flush();

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
        if ($this->params->get('app_domain') == 'larping.eu' || strpos($this->params->get('app_domain'), 'larping.eu') != false) {
            $id = Uuid::fromString('27141158-fde5-4e8b-a2b7-07c7765f0c63');
            $organization = new Organization();
            $organization->setName('Vortex Adventures');
            $organization->setDescription(' ');
            $manager->persist($organization);

            $organization->setId($id);
            $manager->persist($organization);
            $manager->flush();
            $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

            $email = new Email();
            $email->setName('algemene email');
            $email->setEmail('vasecretaris@gmail.com');
            $manager->persist($email);
            $manager->flush();

            $organization->addEmail($email);
            $manager->persist($organization);
            $manager->flush();
        }
    }
}
