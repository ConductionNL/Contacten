<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * All properties that the entity Person holds.
 *
 * Entity Person exists of an id, a givenName, a additionalName, a familyName, one or more telephones, one or more addresses, one or more emails, one or more organisations and one or more contactLists.
 *
 * @author Ruben van der Linde <ruben@conduction.nl>
 * @license EUPL <https://github.com/ConductionNL/contactcatalogus/blob/master/LICENSE.md>
 *
 * @category Entity
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true},
 *  collectionOperations={
 *  	"get",
 *  	"post"
 *  })
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
{
    /**
     * @var UuidInterface UUID of this person
     *
     * @Groups({"read"})
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string Given name of this person
     *
     * @example John
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $givenName;

    /**
     * @var string Additional name of this person
     *
     * @example von
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length (
     *     max = 255
     * )
     */
    private $additionalName;

    /**
     * @var string Family name of this person
     *
     * @example Do
     *
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length (
     *     max = 255
     * )
     */
    private $familyName;

    /**
     * @var Telephone Telephone of this person
     *
     * @example Mobile
     *
     * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Telephone", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $telephones;

    /**
     * @var Address Adresses of this person
     *
     * @example Amsterdam Office
     *
     * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Address", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $adresses;

    /**
     * @var Email Emails of this person
     *
     * @example john@do.com
     *
     * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Email", inversedBy="people", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $emails;

    /**
     * @var Organization Organisations of this person
     *
     * @example Ajax
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization", inversedBy="persons", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $organization;

    /**
     * @var ContactList Contact lists of this person
     *
     * @example All users
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\ContactList", mappedBy="persons")
     * @MaxDepth(1)
     */
    private $contactLists;

    public function __construct()
    {
        $this->telephones = new ArrayCollection();
        $this->adresses = new ArrayCollection();
        $this->contactLists = new ArrayCollection();
        $this->emails = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function setGivenName(string $givenName): self
    {
        $this->givenName = $givenName;

        return $this;
    }

    public function getAdditionalName(): ?string
    {
        return $this->additionalName;
    }

    public function setAdditionalName(?string $additionalName): self
    {
        $this->additionalName = $additionalName;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(?string $familyName): self
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * @return Collection|Telephone[]
     */
    public function getTelephones()
    {
        return $this->telephones;
    }

    public function addTelephone(Telephone $telephone): self
    {
        if (!$this->telephones->contains($telephone)) {
            $this->telephones[] = $telephone;
        }

        return $this;
    }

    public function removeTelephone(Telephone $telephone): self
    {
        if ($this->telephones->contains($telephone)) {
            $this->telephones->removeElement($telephone);
        }

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    public function addAdress(Address $adress): self
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses[] = $adress;
        }

        return $this;
    }

    public function removeAdress(Address $adress): self
    {
        if ($this->adresses->contains($adress)) {
            $this->adresses->removeElement($adress);
        }

        return $this;
    }

    /**
     * @return Collection|Email[]
     */
    public function getEmails()
    {
        return $this->emails;
    }

    public function addEmail(Email $email): self
    {
        if (!$this->emails->contains($email)) {
            $this->emails[] = $email;
        }

        return $this;
    }

    public function removeEmail(Email $email): self
    {
        if ($this->emails->contains($email)) {
            $this->emails->removeElement($email);
        }

        return $this;
    }

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * @return Collection|ContactList[]
     */
    public function getContactLists()
    {
        return $this->contactLists;
    }

    public function addContactList(ContactList $contactList): self
    {
        if (!$this->contactLists->contains($contactList)) {
            $this->contactLists[] = $contactList;
            $contactList->addPerson($this);
        }

        return $this;
    }

    public function removeContactList(ContactList $contactList): self
    {
        if ($this->contactLists->contains($contactList)) {
            $this->contactLists->removeElement($contactList);
            $contactList->removePerson($this);
        }

        return $this;
    }
}
