<?php

namespace App\DataFixtures;

use App\Entity\Organization;
use App\Entity\Person;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ConductionFixtures extends Fixture
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
            $this->params->get('app_domain') != 'conduction.nl' &&
            strpos($this->params->get('app_domain'), 'conduction.nl') == false
        ) {
            return false;
        }

        /*
        * stage.conduction.nl
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
        $testStudent = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        //Organizations
        //Partners
        // Conduction
        $id = Uuid::fromString('9650a44d-d7d1-454a-ab4f-2338c90e8c2f');
        $westfriesland = new Organization();
        $westfriesland->setName('Conduction');
        $westfriesland->setDescription('Conduction');
        $westfriesland->setType('Partner');
        $manager->persist($westfriesland);
        $westfriesland->setId($id);
        $manager->persist($westfriesland);
        $manager->flush();
        $westfriesland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // VNG
        $id = Uuid::fromString('80a987a0-a5e0-4aa0-bd90-a931871d9283');
        $westfriesland = new Organization();
        $westfriesland->setName('VNG');
        $westfriesland->setDescription('Vereniging van Nederlandse Gemeenten');
        $westfriesland->setType('Partner');
        $manager->persist($westfriesland);
        $westfriesland->setId($id);
        $manager->persist($westfriesland);
        $manager->flush();
        $westfriesland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // SIDN
        $id = Uuid::fromString('a30454f9-7e97-4e25-9094-245bab73cf9b');
        $westfriesland = new Organization();
        $westfriesland->setName('SIDN');
        $westfriesland->setDescription('SIDN');
        $westfriesland->setType('Partner');
        $manager->persist($westfriesland);
        $westfriesland->setId($id);
        $manager->persist($westfriesland);
        $manager->flush();
        $westfriesland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        //Participanten
        // ROC Flevoland
        $id = Uuid::fromString('35e3862b-d446-4541-9780-7bfb19c40e01');
        $westfriesland = new Organization();
        $westfriesland->setName('ROC Flevoland');
        $westfriesland->setDescription('ROC van Flevoland');
        $westfriesland->setType('Participant');
        $manager->persist($westfriesland);
        $westfriesland->setId($id);
        $manager->persist($westfriesland);
        $manager->flush();
        $westfriesland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        $manager->flush();
    }
}
