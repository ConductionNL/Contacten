<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Person;
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
    }
}
