<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *  * All properties that the entity Telephone holds.
 *
 * Entity Telephone exists of an id, a name and a telephone.
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
 * @ORM\Entity(repositoryClass="App\Repository\TelephoneRepository")
 */
class Telephone
{
    /**
     * @var UuidInterface UUID of this telephone
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
     * @var string Name of this telephone
     *
     * @example Mobile
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The name of this telephone number used to identify it in a user friendly way",
     *             "type"="string",
     *             "example"="Mobile"
     *         }
     *     }
     * )
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length (
     *     max = 255
     * )
     */
    private $name;

    /**
     * @var string of this telephone
     *
     * @example +31 (0)10-1234567
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The actual phone number including any international prefixes",
     *             "type"="string",
     *             "example"="+31 (0)10-1234567"
     *         }
     *     }
     * )
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\Length (
     *     max = 255
     * )
     * @Assert\NotBlank
     */
    private $telephone;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
