<?php

namespace App\DataFixtures;

use App\Entity\Organization;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class WestfrieslandFixtures extends Fixture
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
            $this->params->get('app_domain') != 'begraven.zaakonline.nl' &&
            strpos($this->params->get('app_domain'), 'begraven.zaakonline.nl') == false &&
            $this->params->get('app_domain') != 'westfriesland.commonground.nu' &&
            strpos($this->params->get('app_domain'), 'westfriesland.commonground.nu') == false
        ) {
            return false;
        }
        // West-Friesland
        $id = Uuid::fromString('b294b0ae-fce4-48d3-bf50-eab1f82ddd7f');
        $westfriesland = new Organization();
        $westfriesland->setName('Westfriesland');
        $westfriesland->setDescription('Samenwerkingsverband Westfriesland');
        $westfriesland->setType('Samenwerkingsverband');
        $manager->persist($westfriesland);
        $westfriesland->setId($id);
        $manager->persist($westfriesland);
        $manager->flush();
        $westfriesland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // Opmeer
        $id = Uuid::fromString('26dee7a2-0fb6-4cc8-b5f6-0b5e2f8aa789');
        $opmeer = new Organization();
        $opmeer->setName('Opmeer');
        $opmeer->setDescription('Gemeente Opmeer');
        $opmeer->setType('Gemeente');
        $manager->persist($opmeer);
        $opmeer->setId($id);
        $manager->persist($opmeer);
        $manager->flush();
        $opmeer = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // Medemblik
        $id = Uuid::fromString('47c8c694-62bb-4dec-b054-556537e896fe');
        $medemblik = new Organization();
        $medemblik->setName('Medemblik');
        $medemblik->setDescription('Gemeente Medemblik');
        $medemblik->setType('Gemeente');
        $manager->persist($medemblik);
        $medemblik->setId($id);
        $manager->persist($medemblik);
        $manager->flush();
        $medemblik = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // SED
        $id = Uuid::fromString('0012428b-dc06-444a-af20-17d3ee06a916');
        $sed = new Organization();
        $sed->setName('SED');
        $sed->setDescription('Gemeenten Stede Broec, Enkhuizen en Drechterland');
        $sed->setType('Gemeente');
        $manager->persist($sed);
        $sed->setId($id);
        $manager->persist($sed);
        $manager->flush();
        $sed = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // Hoorn
        $id = Uuid::fromString('816395fc-4ba4-4fa5-90e9-780bb14a50c2');
        $hoorn = new Organization();
        $hoorn->setName('Hoorn');
        $hoorn->setDescription('Gemeente Hoorn');
        $hoorn->setType('Gemeente');
        $manager->persist($hoorn);
        $hoorn->setId($id);
        $manager->persist($hoorn);
        $manager->flush();
        $hoorn = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        // Koggenland
        $id = Uuid::fromString('5792b63d-afb5-4689-990b-51eec52b663b');
        $koggenland = new Organization();
        $koggenland->setName('Koggenland');
        $koggenland->setDescription('Gemeente Koggenland');
        $koggenland->setType('Gemeente');
        $manager->persist($koggenland);
        $koggenland->setId($id);
        $manager->persist($koggenland);
        $manager->flush();
        $koggenland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        $manager->flush();
    }
}
