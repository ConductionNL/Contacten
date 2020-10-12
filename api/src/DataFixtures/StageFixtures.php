<?php

namespace App\DataFixtures;

use App\Entity\Organization;
use App\Entity\Person;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class StageFixtures extends Fixture
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
            $this->params->get('app_domain') != 'zuiddrecht.nl' && strpos($this->params->get('app_domain'), 'zuiddrecht.nl') == false &&
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false &&
            $this->params->get('app_domain') != 'conduction.academy' && strpos($this->params->get('app_domain'), 'conduction.academy') == false
        ) {
            return false;
        }

        /*
        * Online Stage Platform
        */

        // Test Student
        $id = Uuid::fromString('d961291d-f5c1-46f4-8b4a-6abb41df88db');
        $testStudent = new Person();
        $testStudent->setGivenName('Wilco');
        $testStudent->setFamilyName('Louwerse');
        $manager->persist($testStudent);
        $testStudent->setId($id);
        $manager->persist($testStudent);
        $manager->flush();
        $testStudent = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        //Organizations
        //Partners
        // Conduction
        $id = Uuid::fromString('9650a44d-d7d1-454a-ab4f-2338c90e8c2f');
        $conduction = new Organization();
        $conduction->setName('Conduction');
        $conduction->setDescription('Conduction');
        $conduction->setType('Partner');
        $manager->persist($conduction);
        $conduction->setId($id);
        $manager->persist($conduction);
        $manager->flush();
        $conduction = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // VNG
        $id = Uuid::fromString('80a987a0-a5e0-4aa0-bd90-a931871d9283');
        $vng = new Organization();
        $vng->setName('VNG');
        $vng->setDescription('Vereniging van Nederlandse Gemeenten');
        $vng->setType('Partner');
        $manager->persist($vng);
        $vng->setId($id);
        $manager->persist($vng);
        $manager->flush();
        $vng = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // SIDN
        $id = Uuid::fromString('a30454f9-7e97-4e25-9094-245bab73cf9b');
        $sidn = new Organization();
        $sidn->setName('SIDN');
        $sidn->setDescription('SIDN');
        $sidn->setType('Partner');
        $manager->persist($sidn);
        $sidn->setId($id);
        $manager->persist($sidn);
        $manager->flush();
        $sidn = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        //Participanten
        // ROC Flevoland
        $id = Uuid::fromString('35e3862b-d446-4541-9780-7bfb19c40e01');
        $rocFlevoland = new Organization();
        $rocFlevoland->setName('ROC Flevoland');
        $rocFlevoland->setDescription('ROC van Flevoland');
        $rocFlevoland->setType('Participant');
        $manager->persist($rocFlevoland);
        $rocFlevoland->setId($id);
        $manager->persist($rocFlevoland);
        $manager->flush();
        $rocFlevoland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // Test Participant
        $id = Uuid::fromString('80403186-62c4-4986-a5ed-d58655a9a316');
        $testParticipant = new Organization();
        $testParticipant->setName('Test participant organisatie 1');
        $testParticipant->setDescription('Dit is een test participant organisatie');
        $testParticipant->setType('Participant');
        $manager->persist($testParticipant);
        $testParticipant->setId($id);
        $manager->persist($testParticipant);
        $manager->flush();
        $testParticipant = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        //Leerjaren
        // Test Leerjaar
        $id = Uuid::fromString('a1321118-2780-4b68-a9dc-a232c4b54fa6');
        $testLeerjaar = new Organization();
        $testLeerjaar->setName('Test leerjaar 1');
        $testLeerjaar->setDescription('Dit is een test leerjaar');
        $testLeerjaar->setType('Leerjaar');
        $testLeerjaar->setParentOrganization($testParticipant);
        $manager->persist($testLeerjaar);
        $testLeerjaar->setId($id);
        $manager->persist($testLeerjaar);
        $manager->flush();
        $testLeerjaar = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        //Klassen
        // Test Klas
        $id = Uuid::fromString('ee82d0c2-84c6-4c85-ab65-49bd2339edf4');
        $testKlas = new Organization();
        $testKlas->setName('Test klas 1');
        $testKlas->setDescription('Dit is een test klas');
        $testKlas->setType('Klas');
        $testKlas->setParentOrganization($testLeerjaar);
        $manager->persist($testKlas);
        $testKlas->setId($id);
        $manager->persist($testKlas);
        $manager->flush();
        $testKlas = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        //Studiegroepen
        // Test Studiegroep
        $id = Uuid::fromString('e13df885-be51-490f-b9b3-41ebd9c5b075');
        $testStudiegroep = new Organization();
        $testStudiegroep->setName('Test studiegroep 1');
        $testStudiegroep->setDescription('Dit is een test studiegroep');
        $testStudiegroep->setType('Studiegroep');
        $testStudiegroep->setParentOrganization($testKlas);
        $manager->persist($testStudiegroep);
        $testStudiegroep->setId($id);
        $manager->persist($testStudiegroep);
        $manager->flush();
        $testStudiegroep = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $testStudiegroep->addPerson($testStudent);
        $manager->persist($testStudiegroep);

        $manager->flush();
    }
}
