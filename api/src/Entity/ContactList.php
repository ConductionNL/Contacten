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
 * All properties that the entity ContactList holds.
 *
 * Entity ContactList exists of an id, a name, a description, one or more persons and one or more organisations.
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
 * @ORM\Entity(repositoryClass="App\Repository\ContactListRepository")
 */
class ContactList
{
	/**
	 * @var UuidInterface UUID of this contact list
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
     * @var string $name Name of this contact list
     * @example All users
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The name of this contact list used to identify it in a user friendly way",
     *             "type"="string",
     *             "example"="All users"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string $description Description of this contact list
     * @example This contact list holds all users.
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The description of a contact list",
     *             "type"="string",
     *             "example"="This contact list holds all users."
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var Person $persons Persons this contact list has
     * @example Hans
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The persons this contact list has",
     *             "type"="Person",
     *             "example"="Hans"
     *         }
     *     }
     * )
     *
     *
	 * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Person", inversedBy="contactLists", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $persons;

    /**
     * @var Organization $organizations Organisations this contact list has
     * @example Ajax
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The organisations this contact list has",
     *             "type"="Organization",
     *             "example"="Ajax"
     *         }
     *     }
     * )
     *
     *
	 * @Groups({"read", "write"})
     * @ORM\ManyToMany(targetEntity="App\Entity\Organization", inversedBy="contactLists", fetch="EAGER", cascade={"persist"})
     * @MaxDepth(1)
     */
    private $organizations;

    public function __construct()
    {
        $this->persons = new ArrayCollection();
        $this->organizations = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->persons->contains($person)) {
            $this->persons->removeElement($person);
        }

        return $this;
    }

    /**
     * @return Collection|Organization[]
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }

    public function addOrganization(Organization $organization): self
    {
        if (!$this->organizations->contains($organization)) {
            $this->organizations[] = $organization;
        }

        return $this;
    }

    public function removeOrganization(Organization $organization): self
    {
        if ($this->organizations->contains($organization)) {
            $this->organizations->removeElement($organization);
        }

        return $this;
    }
}
