<?php

namespace App\DataFixtures;

use App\Entity\Email;
use App\Entity\Person;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class IdVaultFixtures extends Fixture
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
            $this->params->get('app_domain') != 'id-vault.com' && strpos($this->params->get('app_domain'), 'checking.nu') == false &&
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false &&
            $this->params->get('app_domain') != 'zuiddrecht.nl' && strpos($this->params->get('app_domain'), 'zuiddrecht.nl') == false
        ) {
            return false;
        }

        // id-vault Ruben
        $id = Uuid::fromString('ce49a652-4b0b-4aa7-98a7-ff4a0cc9e33d');
        $person = new Person();
        $person->setGivenName('Ruben');
        $person->setAdditionalName('Van Der');
        $person->setFamilyName('Linde');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('ruben@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        // id-vault Matthias
        $id = Uuid::fromString('8b97830b-b119-4b58-afcc-f4fe37a1abf8');
        $person = new Person();
        $person->setGivenName('Matthias');
        $person->setFamilyName('Oliveiro');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('matthias@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        // id-vault Marleen
        $id = Uuid::fromString('d1ad5cec-5cb1-4d0a-ba44-b5363fb7f2f7');
        $person = new Person();
        $person->setGivenName('Marleen');
        $person->setFamilyName('Romijn');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('marleen@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        // id-vault Barry
        $id = Uuid::fromString('1f0bc496-aee3-42f5-8b36-29b119944918');
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

        // id-vault Robert
        $id = Uuid::fromString('0f8883ca-9990-4279-9392-50275398adcf');
        $person = new Person();
        $person->setGivenName('Robert');
        $person->setFamilyName('Zondervan');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('robert@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        // id-vault Gino
        $id = Uuid::fromString('543d52ea-86dc-429b-bb96-2a9e7b90ada3');
        $person = new Person();
        $person->setGivenName('Gino');
        $person->setFamilyName('Kok');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('gino@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        // id-vault Wilco
        $id = Uuid::fromString('b2d913f1-9949-4a91-8f6c-e130fc8b243f');
        $person = new Person();
        $person->setGivenName('Wilco');
        $person->setFamilyName('Louwerse');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('wilco@conduction.nl');
        $manager->persist($email);
        $manager->flush();

        // id-vault Yorick
        $id = Uuid::fromString('5e619ed6-3c44-45af-928b-660a3f75be6b');
        $person = new Person();
        $person->setGivenName('Yorick');
        $person->setFamilyName('Groeneveld');
        $manager->persist($person);
        $person->setId($id);
        $manager->persist($person);
        $manager->flush();
        $person = $manager->getRepository('App:Person')->findOneBy(['id'=> $id]);

        $email = new Email();
        $email->setName('Email');
        $email->setEmail('yorick@conduction.nl');
        $manager->persist($email);
        $manager->flush();
    }
}
