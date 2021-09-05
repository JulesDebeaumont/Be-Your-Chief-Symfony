<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MarchantSpecificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MarchantSpecificationRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"merchant-sp:list"}}
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"merchant-sp:read"}}
 *              }
 *     }
 *   )
 */
class MerchantSpecification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ({"merchant:read", "merchant-sp:read", "merchant-sp:list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups ({"merchant:read", "merchant-sp:read", "merchant-sp:list"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Merchant::class, mappedBy="merchantSpecification")
     */
    private $merchants;

    public function __construct()
    {
        $this->merchants = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * @return Collection|Merchant[]
     */
    public function getMerchants(): Collection
    {
        return $this->merchants;
    }

    public function addMerchant(Merchant $merchant): self
    {
        if (!$this->merchants->contains($merchant)) {
            $this->merchants[] = $merchant;
            $merchant->setMerchantSpecification($this);
        }

        return $this;
    }

    public function removeMerchant(Merchant $merchant): self
    {
        if ($this->merchants->removeElement($merchant)) {
            // set the owning side to null (unless already changed)
            if ($merchant->getMerchantSpecification() === $this) {
                $merchant->setMerchantSpecification(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
