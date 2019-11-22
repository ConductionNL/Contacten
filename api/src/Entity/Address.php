<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * All properties that the entity Address holds.
 *
 * Entity Address exists of an id, a name, a bagnummeraanduiding, a street, a houseNumber, a houseNumberSufix, a postalCode, a region, a locality and country.
 *
 * @author Ruben van der Linde <ruben@conduction.nl>
 * @license EUPL <https://github.com/ConductionNL/contactcatalogus/blob/master/LICENSE.md>
 * @category Entity
 * @package contactcatalogus
 *
 * @ApiResource(
 *  normalizationContext={"groups"={"read"}},
 *  denormalizationContext={"groups"={"write"}},
 *  collectionOperations={
 *  	"get",
 *  	"post"
 *  })
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
{
	/**
	 * @var UuidInterface Uuid of this address
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
     *
     * @Assert\NotBlank
     * @Assert\Uuid
	 */
	private $id;

	/**
     * @var string $name Name of this Address
     * @example Amsterdam Office
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
	 *         	   "description" = "The name of this adress used to identify it in a user friendly way",
     *             "type"="string",
     *             "example"="Amsterdam Office"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
	 * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     max = 255
     * )
	 */
	private $name;

    /**
     * @var string $bagnummeraanduiding Bagnummeraanduiding of this Address
     * @example 0363200000218908
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
	 *         	   "description" = "The BAG identifier of this address",
     *             "type"="string",
     *             "example"="0363200000218908"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\Length(
     *     max = 15
     * )
     */
    private $bagnummeraanduiding;

    /**
     * @var string $street Street of this Address
     * @example appelstreet
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The street of this address",
     *             "type"="string",
     *             "example"="appelstreet"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $street;

    /**
     * @var string $houseNumber House number of this Address
     * @example 8
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The house number of this address",
     *             "type"="string",
     *             "example"="8"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $houseNumber;

    /**
     * @var string $houseNumberSufix House number sufix of this Address
     * @example b
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The house number sufix of this address",
     *             "type"="string",
     *             "example"="b"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $houseNumberSufix;

    /**
     * @var string $postalCode Postalcode of a Address
     * @example 1234AB
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The postalcode of this address",
     *             "type"="string",
     *             "example"="1234AB"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $postalCode;

    /**
     * @var string region Region of a Address
     * @example Noord-Holland
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The region of this address",
     *             "type"="string",
     *             "example"="Noord-Holland"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     *)
     */
    private $region;

    /**
     * @var string $locality Locality of a Address
     * @example Oud-Zuid
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The locality of this address",
     *             "type"="string",
     *             "example"="Oud-Zuid"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     *)
     */
    private $locality;

    /**
     * @var string $country Country of a Address
     * @example The Netherlands
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The country of this address",
     *             "type"="string",
     *             "example"="The Netherlands"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     *)
     */
    private $country;

    /**
     * @var string $postOfficeBoxNumber Post office box number of a Address
     * @example PO Box 1234
     *
     * @ApiProperty(
     * 	   identifier=true,
     *     attributes={
     *         "swagger_context"={
     *         	   "description" = "The Post office box number of this address",
     *             "type"="string",
     *             "example"="PO Box 1234"
     *         }
     *     }
     * )
     *
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     *)
     */
    private $postOfficeBoxNumber;

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

    public function getBagnummeraanduiding(): ?string
    {
        return $this->bagnummeraanduiding;
    }

    public function setBagnummeraanduiding(?string $bagnummeraanduiding): self
    {
        $this->bagnummeraanduiding = $bagnummeraanduiding;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getHouseNumber(): ?string
    {
    	return $this->houseNumber;
    }

    public function setHouseNumber(?string $houseNumber): self
    {
    	$this->houseNumber = $houseNumber;

    	return $this;
    }

    public function getHouseNumberSufix(): ?string
    {
    	return $this->houseNumberSufix;
    }

    public function setHouseNumberSufix(?string $houseNumberSufix): self
    {
    	$this->houseNumberSufix = $houseNumberSufix;

    	return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostOfficeBoxNumber(): ?string
    {
        return $this->postOfficeBoxNumber;
    }

    public function setPostOfficeBoxNumber(?string $postOfficeBoxNumber): self
    {
        $this->postOfficeBoxNumber = $postOfficeBoxNumber;

        return $this;
    }
}
