<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MerchantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MerchantRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "normalization_context"={"groups"={"merchant:create"}},
 *              "denormalization_context"={"groups"={"merchant:create"}},
 *             "security" ="is_granted('ROLE_USER') and object == user ",
 *          },
 *          "get"={
 *              "normalization_context"={"groups"={"merchant:read"}}
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"merchant:read"}}
 *          },
 *          "patch"={
 *              "denormalization_context"={"groups"={"merchant:edit"}},
 *              "normalization_context"={"groups"={"merchant:edit"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          },
 *          "delete"={
 *              "normalization_context"={"groups"={"merchant:read"}},
 *              "denormalization_context"={"groups"={"merchant:delete"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          }
 *     }
 * )
 */
class Merchant extends Account
{
    /**
     * @ORM\Column(type="string", length=55)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $webSiteLink;

    /**
     * @ORM\ManyToOne(targetEntity=MerchantSpecification::class, inversedBy="merchants")
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $merchantSpecification;

    /**
     * @ORM\ManyToOne(targetEntity=MerchantType::class, inversedBy="merchants")
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $merchantType;

    /**
     * @ORM\OneToOne(targetEntity=Schedule::class, cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups ({"merchant:read", "merchant:edit", "merchant:delete"})
     */
    private $schedules;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $postalCode;

    public function __construct()
    {
        parent::__construct();
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

    public function getWebSiteLink(): ?string
    {
        return $this->webSiteLink;
    }

    public function setWebSiteLink(?string $webSiteLink): self
    {
        $this->webSiteLink = $webSiteLink;

        return $this;
    }

    public function getMerchantSpecification(): ?MerchantSpecification
    {
        return $this->merchantSpecification;
    }

    public function setMerchantSpecification(?MerchantSpecification $merchantSpecification): self
    {
        $this->merchantSpecification = $merchantSpecification;

        return $this;
    }

    public function getMerchantType(): ?MerchantType
    {
        return $this->merchantType;
    }

    public function setMerchantType(?MerchantType $merchantType): self
    {
        $this->merchantType = $merchantType;

        return $this;
    }

    public function getSchedules(): ?Schedule
    {
        return $this->schedules;
    }

    public function setSchedules(?Schedule $schedules): self
    {
        $this->schedules = $schedules;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

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
}
