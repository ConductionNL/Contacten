<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Organization;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
        $email = new Email();
        $email->setEmail('info@westfriesland.nl');
        $westfriesland->addEmail($email);
        $manager->persist($westfriesland);
        $manager->flush();

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
        $email = new Email();
        $email->setEmail('info@opmeer.nl');

        $opmeer->addEmail($email);
        $manager->persist($opmeer);
        $manager->flush();

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
        $email = new Email();
        $email->setEmail('info@medemblik.nl');

        $medemblik->addEmail($email);
        $manager->persist($medemblik);
        $manager->flush();

        // Enkhuizen
        $id = Uuid::fromString('0012428b-dc06-444a-af20-17d3ee06a916');
        $enkhuizen = new Organization();
        $enkhuizen->setName('Enkhuizen');
        $enkhuizen->setDescription('Gemeente Enkhuizen');
        $enkhuizen->setType('Gemeente');

        $manager->persist($enkhuizen);
        $enkhuizen->setId($id);
        $manager->persist($enkhuizen);
        $manager->flush();
        $enkhuizen = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $email = new Email();
        $email->setEmail('info@enkhuizen.nl');

        $enkhuizen->addEmail($email);
        $manager->persist($enkhuizen);
        $manager->flush();

        // Drechterland
        $id = Uuid::fromString('756e50b8-4fd7-44d4-99d6-7f8ef47c3678');
        $drechterland = new Organization();
        $drechterland->setName('Drechterland');
        $drechterland->setDescription('Gemeente Drechterland');
        $drechterland->setType('Gemeente');

        $manager->persist($drechterland);
        $drechterland->setId($id);
        $manager->persist($drechterland);
        $manager->flush();
        $drechterland = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $email = new Email();
        $email->setEmail('info@drechterland.nl');

        $drechterland->addEmail($email);
        $manager->persist($drechterland);
        $manager->flush();

        // Stedebroec
        $id = Uuid::fromString('93a892a9-d164-4d37-bfa5-a37c52ab3840');
        $stedebroec = new Organization();
        $stedebroec->setName('Stedebroec');
        $stedebroec->setDescription('Gemeente Stedebroec');
        $stedebroec->setType('Gemeente');

        $manager->persist($stedebroec);
        $stedebroec->setId($id);
        $manager->persist($stedebroec);
        $manager->flush();
        $stedebroec = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);
        $email = new Email();
        $email->setEmail('info@stedebroec.nl');

        $stedebroec->addEmail($email);
        $manager->persist($stedebroec);
        $manager->flush();

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
        $email = new Email();
        $email->setEmail('info@hoorn.nl');

        $hoorn->addEmail($email);
        $manager->persist($hoorn);
        $manager->flush();

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
        $email = new Email();
        $email->setEmail('info@koggenland.nl');

        $koggenland->addEmail($email);
        $manager->persist($koggenland);
        $manager->flush();

        $manager->flush();
    }
}
