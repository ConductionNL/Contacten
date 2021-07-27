<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Person;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class TaalhuizenFixtures extends Fixture
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
            $this->params->get('app_domain') != 'taalhuizen-bisc.commonground.nu' && strpos($this->params->get('app_domain'), 'taalhuizen-bisc.commonground.nu') == false
        ) {
            return false;
        }

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('main+testadmin@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('8001c512-e65a-480d-8f2f-84ca3a6a07ce');
        $person = new Person();
        $person->setGivenName('test');
        $person->setFamilyName('admin');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);
        $person->addEmail($email);
        $manager->persist($person);
        $manager->flush();

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('rick@lifely.nl');
        $manager->persist($email);
        $manager->flush();

        $id = Uuid::fromString('62bc09d3-2f34-4fa4-880c-da6adec9569f');
        $person = new Person();
        $person->setGivenName('rick');
        $person->setFamilyName('lifely');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);
        $person->addEmail($email);
        $manager->persist($person);
        $manager->flush();
    }
}
