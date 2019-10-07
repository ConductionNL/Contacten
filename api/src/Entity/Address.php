<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
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
	 *         	   "description" = "The name of this adress used to identify it in a user friendly way",
     *             "type"="string",
     *             "example"="Amsterdam Office"
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
	 *         	   "description" = "The BAG identifier of this address",
     *             "type"="string",
     *             "example"="0363200000218908"
     *         }
     *     }
     * )
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $bagnummeraanduiding;

    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $street;
    
    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $houseNumber;
    
    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $houseNumberSufix;

    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $postalCode;

    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $region;

    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locality;

    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
	 * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
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
