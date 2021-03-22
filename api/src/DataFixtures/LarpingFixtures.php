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

//        $id = Uuid::fromString('e68232e4-9601-4c8a-996d-8dcf739e62d9');
//        $person = new Person();
//        $person->setGivenName('Barry');
//        $person->setFamilyName('Brands');
//        $manager->persist($person);
//        $person->setId($id);
//        $manager->persist($person);
//        $manager->flush();
//        $person = $manager->getRepository('App:Person')->findOneBy(['id' => $id]);
//
//        $email = new Email();
//        $email->setName('Email');
//        $email->setEmail('barry@conduction.nl');
//        $manager->persist($email);
//        $manager->flush();
//
//        $id = Uuid::fromString('51178e23-62e8-42f1-a96b-f60e7513a694');
//        $org = new Organization();
//        $org->setName('Larping');
//        $manager->persist($org);
//        $org->setId($id);
//        $manager->persist($org);
//        $manager->flush();
//        $org = $manager->getRepository('App:Person')->findOneBy(['id' => $id]);
//        $manager->flush();

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

        $id = Uuid::fromString('58a681b0-7ff8-4b42-98c0-eef371117d4a');
        $website = new Social();
        $website->setName('Website van Vortex Adventures');
        $website->setDescription('Vortex Adventures');
        $website->setType('website');
        $website->setUrl('http://www.the-vortex.nl');
        $manager->persist($website);
        $website->setId($id);
        $manager->persist($website);
        $manager->flush();
        $website = $manager->getRepository('App:Social')->findOneBy(['id'=> $id]);

        // Vortex
        $id = Uuid::fromString('c69a9073-9d72-4743-ad33-3c4c7fb34589');
        $organization = new Organization();
        $organization->setName('Vortex Adventures');
        $organization->setDescription('Vortex Adventures');
        $organization->setSourceOrganization($this->commonGroundService->cleanUrl(['component'=>'wrc', 'type'=>'organizations', 'id'=>'e62b32b5-2d1f-4412-9eb7-225bce414d05']));
        $manager->persist($organization);
        $organization->setId($id);
        $manager->persist($organization);
        $manager->flush();
        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $organization->addSocial($website);
        $manager->persist($organization);
        $manager->flush();

//        $id = Uuid::fromString('f13c6c4c-047d-4c2a-b2ea-8bb798c90190');
//        $website = new Social();
//        $website->setName('Website van Conduction');
//        $website->setDescription('Conduction');
//        $website->setType('website');
//        $website->setUrl('https://www.conduction.nl');
//        $manager->persist($website);
//        $website->setId($id);
//        $manager->persist($website);
//        $manager->flush();
//        $website = $manager->getRepository('App:Social')->findOneBy(['id'=> $id]);
//
//        $id = Uuid::fromString('a2177b92-56e0-4edf-9af2-8b98eb2aea0e');
//        $organization = new Organization();
//        $organization->setName('Conduction');
//        $organization->setDescription('Conduction organisatie');
//        $manager->persist($organization);
//        $organization->setId($id);
//        $manager->persist($organization);
//        $manager->flush();
//        $organization = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
//        $organization->addSocial($website);
//        $manager->persist($organization);
//        $manager->flush();
    }
}
