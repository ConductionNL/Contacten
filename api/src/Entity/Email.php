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
 * All properties that the entity Email holds.
 *
 * Entity Email exists of an id, a name, a email, one or more people and one or more organisations.
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
 * @ORM\Entity(repositoryClass="App\Repository\EmailRepository")
 */
class Email
{
	/**
	 * @var UuidInterface UUID of this email
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
     * @var string $name Name of this email
     * @example Private
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
	 *         	   "description" = "The name of this email adress used to identify it in a user friendly way",
     *             "type"="string",
     *             "example"="Private"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $name;

    /**
     * @var string $email Email of this email
     * @example Private
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
	 *         	   "description" = "The actual email adress",
     *             "type"="string",
     *             "example"="john@do.com"
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
    private $email;

    /**
     * @var Person $person Person of this email
     * @example Hans
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "People of this email",
     *             "type"="Person",
     *             "example"="Hans"
     *         }
     *     }
     * )
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Person", mappedBy="emails")
     * @MaxDepth(1)
     */
    private $people;

    /**
     * @var Organization $organizations Organisation of this email
     * @example Ajax
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "Organisations of this email",
     *             "type"="Person",
     *             "example"="Ajax"
     *         }
     *     }
     * )
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Organization", mappedBy="emails")
     * @MaxDepth(1)
     */
    private $organizations;

    public function __construct()
    {
        $this->people = new ArrayCollection();
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

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Person[]
     */
    public function getPeople()
    {
        return $this->people;
    }

    public function addPerson(Person $person): self
    {
        if (!$this->people->contains($person)) {
            $this->people[] = $person;
            $person->addEmail($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->people->contains($person)) {
            $this->people->removeElement($person);
            $person->removeEmail($this);
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
            $organization->addEmail($this);
        }

        return $this;
    }

    public function removeOrganization(Organization $organization): self
    {
        if ($this->organizations->contains($organization)) {
            $this->organizations->removeElement($organization);
            $organization->removeEmail($this);
        }

        return $this;
    }
}
