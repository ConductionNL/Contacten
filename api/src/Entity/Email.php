<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *  normalizationContext={"groups"={"read"}},
 *  denormalizationContext={"groups"={"write"}},
 *  collectionOperations={
 *  	"get",
 *  	"post"
 *  })
 * @ORM\Entity(repositoryClass="App\Repository\EmailRepository")
 */
class Email
{
	/**
	 * @var \Ramsey\Uuid\UuidInterface
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
     * @ApiProperty(
     * 	   identifier=true,
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
     */
    private $name;

    /**
     * @ApiProperty(
     * 	   identifier=true,
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
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Person", mappedBy="emails")
     */
    private $people;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Organization", mappedBy="emails")
     */
    private $organizations;

    public function __construct()
    {
        $this->people = new ArrayCollection();
        $this->organizations = new ArrayCollection();
    }

    public function getId(): ?int
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
    public function getPeople(): Collection
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
    public function getOrganizations(): Collection
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
