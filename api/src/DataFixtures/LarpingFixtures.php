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

class LarpingFixtures extends Fixture
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
            !$this->params->get('app_build_all_fixtures') &&
            $this->params->get('app_domain') != 'larping.eu' && strpos($this->params->get('app_domain'), 'larping.eu') == false
        ) {
            return false;
        }

        $id = Uuid::fromString('e68232e4-9601-4c8a-996d-8dcf739e62d9');
        $person = new Person();
        $person->setGivenName('Barry');
        $person->setFamilyName('Brands');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('barry@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('51178e23-62e8-42f1-a96b-f60e7513a694');
        $org = new Organization();
        $org->setName('Larping');
        $manager->persist($org);
        $org->setId($id);
        $manager->persist($org);
        $manager->flush();
        $org = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);
        $manager->flush();

//        $id = Uuid::fromString('c69a9073-9d72-4743-ad33-3c4c7fb34589');
//        $org = new Organization();
//        $org->setName('Vortex Adventures');
//        $org->setDescription('Vortex Adventures');
//        $manager->persist($org);
//        $org->setId($id);
//        $manager->persist($org);
//        $manager->flush();
//        $org = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);
//
//        $id = Uuid::fromString('58a681b0-7ff8-4b42-98c0-eef371117d4a');
//        $social = new Social();
//        $social->setName('Social van Vortex Adventures');
//        $social->setWebsite('http://www.the-vortex.nl');
//        $social->setOrganization($org);
//        $manager->persist($social);
//        $social->setId($id);
//        $manager->persist($social);
//        $manager->flush();
//        $social = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('c69a9073-9d72-4743-ad33-3c4c7fb34589');
        $organization = new Organization();
        $organization->setName('Vortex Adventures');
        $organization->setDescription('Vortex Adventures');
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('58a681b0-7ff8-4b42-98c0-eef371117d4a');
        $social = new Social();
        $social->setName('Social van Vortex Adventures');
        $social->setDescription('Vortex Adventures');
        $social->setWebsite('http://www.the-vortex.nl');
        $social->setOrganization($organization);
        $manager->persist($social);
        $social->setId($id);
        $manager->persist($social);
        $manager->flush();
        $social = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        $manager->flush();
    }
}
