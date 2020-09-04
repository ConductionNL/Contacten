<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Organization;
use App\Entity\Person;
use App\Entity\Social;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ZuidDrechtFixtures extends Fixture
{
    private $params;
    /**
     * @var CommonGroundService
     */
    private $commonGroundService;

    public function __construct(ParameterBagInterface $params, CommonGroundService $commonGroundService)
    {
        $this->params = $params;
        $this->commonGroundService = $commonGroundService;
    }

    public function load(ObjectManager $manager)
    {
        if (
            $this->params->get('app_domain') != 'zuid-drecht.nl' &&
            strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false &&
            $this->params->get('app_domain') != 'zuiddrecht.nl' &&
            strpos($this->params->get('app_domain'), 'zuiddrecht.nl') == false
        ) {
            return false;
        }

        // Zuid-Drecht
        $id = Uuid::fromString('344867d7-d71d-44d6-90ff-8603c2422058');
        $organization = new Organization();
        $organization->setName('Zuid Drecht');
        $organization->setDescription('De meest inovatieve gemeenten van nederland');
        $organization->setType('township');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('2edd04cd-117a-45e3-b5b0-5d5d94fd41e9');
        $social = new Social();
        $social->setName('Social van Zuid Drecht');
        $social->setDescription('De meest inovatieve gemeenten van nederland');
        $social->setWebsite('https://zuid-drecht.nl');
        $social->setOrganization($organization);
        $manager->persist($social);
        $social->setId($id);
        $manager->persist($social);
        $manager->flush();
        $social = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // Test Student
        $id = Uuid::fromString('f7f9afcf-9aaf-4e36-8911-4cf1ebf3270f');
        $person = new Person();
        $person->setGivenName('Chris');
        $person->setFamilyName('Kat');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $manager->flush();

        $email = new Email();
        $email->setName('primary');
        $email->setEmail('c.kat@zuid-drecht.nl');
        $email->addPerson($person);

        $manager->persist($email);
        $manager->flush();

        // checkin gebruiker
        $id = Uuid::fromString('25006d28-350a-42e9-b9ed-7afb25d4321d');
        $person = new Person();
        $person->setGivenName('Jan');
        $person->setFamilyName('Willem');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $organization = new Organization();
        $organization->setName('cafe de zwarte raaf');
        $organization->setDescription('cafe de zwarte raaf');
        $organization->setType('cafe');
        $organization->addPerson($person);

        $manager->persist($organization);
        $manager->flush();


    }
}
