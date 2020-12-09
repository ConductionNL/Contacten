<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Organization;
use App\Entity\Person;
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
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false
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
    }
}
