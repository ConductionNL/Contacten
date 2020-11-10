<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Organization;
use App\Entity\Person;
use App\Entity\Social;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CheckinFixtures extends Fixture
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
            $this->params->get('app_domain') != 'checking.nu' && strpos($this->params->get('app_domain'), 'checking.nu') == false &&
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false &&
            $this->params->get('app_domain') != 'zuiddrecht.nl' && strpos($this->params->get('app_domain'), 'zuiddrecht.nl') == false
        ) {
            return false;
        }

        $id = Uuid::fromString('55247f46-77d4-438e-90f1-524595767c42');
        $organization = new Organization();
        $organization->setName('Checking');
        $organization->setDescription('Checking');
        $organization->setType('platform');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        //$organization->addPerson($person);
        $email = new Email();
        $email->setEmail('info@conduction.nl');
        $organization->addEmail($email);
        $manager->persist($organization);
        $manager->flush();

        // checkin gebruiker
        $id = Uuid::fromString('499aedcd-5bfe-4718-a785-7d0a1764eb0b');
        $person = new Person();
        $person->setGivenName('Jan');
        $person->setFamilyName('Willem');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('info@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('789b788e-fcd0-4627-b969-aaa4bd42aed7');
        $organization = new Organization();
        $organization->setName('Cafe de zotte raaf');
        $organization->setDescription('cafe de zwarte raaf');
        $organization->setType('cafe');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $organization->addPerson($person);
        $organization->addEmail($email);
        $manager->persist($organization);
        $manager->flush();

        $id = Uuid::fromString('f6dc23ab-89e3-416e-bf40-d2f71485548e');
        $person = new Person();
        $person->setGivenName('Jan');
        $person->setFamilyName('Willem');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('info@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('0550d019-502d-480a-ab46-6ed75bc8551a');
        $organization = new Organization();
        $organization->setName('Restautant Goudlust');
        $organization->setDescription('cafe de zwarte raaf');
        $organization->setType('cafe');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $organization->addPerson($person);
        $organization->addEmail($email);

        $manager->persist($organization);
        $manager->flush();

        $id = Uuid::fromString('d1f32495-33a6-4e86-91a0-a7aa18f09f42');
        $person = new Person();
        $person->setGivenName('Jan');
        $person->setFamilyName('Willem');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('info@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('0265628a-1b0e-4505-bba9-370e5ca88671');
        $organization = new Organization();
        $organization->setName('Hotel Dijkzicht');
        $organization->setDescription('cafe de zwarte raaf');
        $organization->setType('cafe');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $organization->addPerson($person);
        $organization->addEmail($email);

        $manager->persist($organization);
        $manager->flush();

        $id = Uuid::fromString('841949b7-7488-429f-9171-3a4338b541a6');
        $person = new Person();
        $person->setGivenName('Jan');
        $person->setFamilyName('Willem');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('info@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('ff46b373-bcb3-4b9a-9837-c50c15915158');
        $organization = new Organization();
        $organization->setName('Camping de alpen koe');
        $organization->setDescription('Camping de alpen koe');
        $organization->setType('cafe');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $organization->addPerson($person);
        $organization->addEmail($email);

        $manager->persist($organization);
        $manager->flush();

        $id = Uuid::fromString('25006d28-350a-42e9-b9ed-7afb25d4321d');
        $person = new Person();
        $person->setGivenName('Kees');
        $person->setFamilyName('De korte');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('info@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('35ca41b8-045d-4e52-a011-124ad37b5f04');
        $organization = new Organization();
        $organization->setName('Mc Donalds Zuid-Drecht');
        $organization->setDescription('Mc Donalds Zuid-Drecht');
        $organization->setType('restaurant');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $organization->addPerson($person);
        $organization->addEmail($email);

        $manager->persist($organization);
        $manager->flush();

        $id = Uuid::fromString('2bdb2fe0-784d-46a3-949e-7db99d2fc089');
        $person = new Person();
        $person->setGivenName('Hugo');
        $person->setFamilyName('de Groot');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $social = new Social();
        $social->setName('Creative Ground');
        $social->setDescription('Socials creative Ground');
        $social->setWebsite('https://creativegrounds.com/');
        $social->setInstagram('https://www.instagram.com/creativegroundsnl/');
        $manager->persist($social);
        $manager->flush();

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('info@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('e11acb98-1fb3-4ae5-beea-1a33aa381d1a');
        $organization = new Organization();
        $organization->setName('Creative Ground');
        $organization->setDescription('Creative Ground');
        $organization->setType('co-working space');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $organization->addPerson($person);
        $organization->addSocial($social);
        $organization->addEmail($email);
        $manager->persist($organization);
        $manager->flush();
    }
}
