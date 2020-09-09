<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * All properties that the entity Organisation holds.
 *
 * Entity Organisation exists of an id, a name, a description, a kvk number, one or more telephones, one or more addresses, one or more emails, one or more persons and one or more contactLists.
 *
 * @author Ruben van der Linde <ruben@conduction.nl>
 * @license EUPL <https://github.com/ConductionNL/contactcatalogus/blob/master/LICENSE.md>
 *
 * @category Entity
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true},
 *     itemOperations={
 *          "get",
 *          "put",
 *          "delete",
 *          "get_change_logs"={
 *              "path"="/organizations/{id}/change_log",
 *              "method"="get",
 *              "swagger_context" = {
 *                  "summary"="Changelogs",
 *                  "description"="Gets al the change logs for this resource"
 *              }
 *          },
 *          "get_audit_trail"={
 *              "path"="/organizations/{id}/audit_trail",
 *              "method"="get",
 *              "swagger_context" = {
 *                  "summary"="Audittrail",
 *                  "description"="Gets the audit trail for this resource"
 *              }
 *          }
 *     },
 *  collectionOperations={
 *  	"get",
 *  	"post"
 *  })
 * @ORM\Entity(repositoryClass="App\Repository\OrganizationRepository")
 * @Gedmo\Loggable(logEntryClass="Conduction\CommonGroundBundle\Entity\ChangeLog")
 *
 * @ApiFilter(BooleanFilter::class)
 * @ApiFilter(OrderFilter::class)
 * @ApiFilter(DateFilter::class, strategy=DateFilter::EXCLUDE_NULL)
 * @ApiFilter(SearchFilter::class)
 */
class Organization
{
    /**
     * @var UuidInterface UUID of this organisation
     *
     *
     * @Groups({"read"})
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string Name of this organisation
     *
     * @example Ajax
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string Description of this organisation
     *
     * @example Ajax is a dutch soccer club
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @var string Type of this organisation
     *
     * @example Township
     *
     * @Gedmo\Versioned
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $type;

    /**
     * @var string Kvk of this organisation
     *
     * @Gedmo\Versioned
     *
     * @example 123456
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\Length(
     *     max = 15
     * )
     */
    private $kvk;

    /**
     * @param Organization $parentOrganization The larger organization that this organization is a subOrganization of.
     *
     * @Groups({"read", "write"})
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization", inversedBy="subOrganizations")
     */
    private $parentOrganization;

    /**
     * @var ArrayCollection|Organization[] The sub-organizations of which this organization is the parent organization.
     *
     * @Groups({"read", "write"})
     * @MaxDepth(1)
     * @ORM\OneToMany(targetEntity="App\Entity\Organization", mappedBy="parentOrganization")
     */
    private $subOrganizations;

    /**
     * @var Telephone Telephone of this organisation
     *
     * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Telephone", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $telephones;
    /**
     * @var Address Address of this organisation
     *
     * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Address", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $adresses;

    /**
     * @var Email Email of this organisation
     *
     * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Email", inversedBy="organizations", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $emails;

    /**
     * @var Person Person of this organisation
     *
     * @Groups({"read", "write"})
     * @ORM\OneToMany(targetEntity="App\Entity\Person", mappedBy="organization")
     * @MaxDepth(1)
     */
    private $persons;

    /**
     * @var ContactList Contact list of this organisation
     *
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\ContactList", mappedBy="organizations")
     * @MaxDepth(1)
     */
    private $contactLists;

    /**
     * @var Datetime The moment this resource was created
     *
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var Datetime The moment this resource last Modified
     *
     * @Groups({"read"})
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModified;

    /**
     * @Groups({"read", "write"})
     * @ORM\OneToMany(targetEntity=Social::class, mappedBy="organization")
     * @MaxDepth(1)
     */
    private $socials;

    public function __construct()
    {
        $this->telephones = new ArrayCollection();
        $this->adresses = new ArrayCollection();
        $this->persons = new ArrayCollection();
        $this->contactLists = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->socials = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getKvk(): ?string
    {
        return $this->kvk;
    }

    public function setKvk(?string $kvk): self
    {
        $this->kvk = $kvk;

        return $this;
    }

    public function getParentOrganization(): ?self
    {
        return $this->parentOrganization;
    }

    public function setParentOrganization(?self $parentOrganization): self
    {
        $this->parentOrganization = $parentOrganization;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSubOrganizations(): Collection
    {
        return $this->subOrganizations;
    }

    public function addSubOrganization(self $subOrganization): self
    {
        if (!$this->subOrganizations->contains($subOrganization)) {
            $this->subOrganizations[] = $subOrganization;
            $subOrganization->setParentOrganization($this);
        }

        return $this;
    }

    public function removeSubOrganization(self $subOrganization): self
    {
        if ($this->subOrganizations->contains($subOrganization)) {
            $this->subOrganizations->removeElement($subOrganization);
            // set the owning side to null (unless already changed)
            if ($subOrganization->getParentOrganization() === $this) {
                $subOrganization->setParentOrganization(null);
            }
        }

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

    /**
     * @return Collection|Person[]
     */
    public function getPersons()
    {
        return $this->persons;
    }

    public function addPerson(Person $person): self
    {
        if (!$this->persons->contains($person)) {
            $this->persons[] = $person;
            $person->setOrganization($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->persons->contains($person)) {
            $this->persons->removeElement($person);
            // set the owning side to null (unless already changed)
            if ($person->getOrganization() === $this) {
                $person->setOrganization(null);
            }
        }

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
            $contactList->addOrganization($this);
        }

        return $this;
    }

    public function removeContactList(ContactList $contactList): self
    {
        if ($this->contactLists->contains($contactList)) {
            $this->contactLists->removeElement($contactList);
            $contactList->removeOrganization($this);
        }

        return $this;
    }

    /**
     * @return Collection|Social[]
     */
    public function getSocials(): Collection
    {
        return $this->socials;
    }

    public function addSocial(Social $social): self
    {
        if (!$this->socials->contains($social)) {
            $this->socials[] = $social;
            $social->setOrganization($this);
        }

        return $this;
    }

    public function removeSocial(Social $social): self
    {
        if ($this->socials->contains($social)) {
            $this->socials->removeElement($social);
            // set the owning side to null (unless already changed)
            if ($social->getOrganization() === $this) {
                $social->setOrganization(null);
            }
        }

        return $this;
    }
}
