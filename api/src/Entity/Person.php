<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * All properties that the entity Person holds.
 *
 * Entity Person exists of an id, a givenName, a additionalName, a familyName, one or more telephones, one or more addresses, one or more emails, one or more organisations and one or more contactLists.
 *
 * @author Ruben van der Linde <ruben@conduction.nl>
 * @license EUPL <https://github.com/ConductionNL/contactcatalogus/blob/master/LICENSE.md>
 * @category Entity
 * @package contactcatalogus
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
	 * @ApiProperty(
	 * 	   identifier=true,
	 *     attributes={
	 *         "swagger_context"={
	 *         	   "description" = "The UUID identifier of this object",
	 *             "type"="string",
	 *             "format"="uuid",
	 *             "example"="e2984465-190a-4562-829e-a8cca81aa35d"
	 *         }
	 *     }
	 * )
	 *
	 * @Groups({"read"})
	 * @ORM\Id
	 * @ORM\Column(type="uuid", unique=true)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
	 */
	private $id;

    /**
     * @var string $givenName Given name of this person
     * @example John
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
	 *         	   "description" = "Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property.",
     *             "type"="string",
     *             "example"="John"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $givenName;

    /**
     * @var string $additionalName Additional name of this person
     * @example von
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
	 *         	   "description" = "An additional name for a Person, can be used for a middle name.",
     *             "type"="string",
     *             "example"="von"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length (
     *     max = 255
     * )
     */
    private $additionalName;

    /**
     * @var string $familyName Family name of this person
     * @example Do
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
	 *         	   "description" = "Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the name property.",
     *             "type"="string",
     *             "example"="Do"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length (
     *     max = 255
     * )
     */
    private $familyName;

    /**
     * @var Telephone $telephones Telephone of this person
     * @example Mobile
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "This is the telephone of this person",
     *             "type"="Telephone",
     *             "example"="Mobile"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Telephone", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $telephones;

    /**
     * @var Address $adresses Adresses of this person
     * @example Amsterdam Office
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "This is the adress of this person",
     *             "type"="Address",
     *             "example"="Amsterdam Office"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Address", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $adresses;

    /**
     * @var Email $emails Emails of this person
     * @example john@do.com
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "This is the email of this person",
     *             "type"="Email",
     *             "example"="john@do.com"
     *         }
     *     }
     * )
     *
     * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Email", inversedBy="people", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $emails;

    /**
     * @var Organization $organization Organisations of this person
     * @example Ajax
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "This is the organisation of this person",
     *             "type"="Organization",
     *             "example"="Ajax"
     *         }
     *     }
     * )
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization", inversedBy="persons", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $organization;

    /**
     * @var ContactList $contactLists Contact lists of this person
     * @example All users
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "These are the contact list this person belongs to",
     *             "type"="ContactList",
     *             "example"="All users"
     *         }
     *     }
     * )
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
