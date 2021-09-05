<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\RecipOriginRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RecipOriginRepository::class)
 * @ApiFilter(SearchFilter::class, properties=
 *     {
 *     "name" : "partial"
 *     })
 * @ApiResource(
 *
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"reciporigin:list"}},
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"reciporigin:read"}}
 *          }
 *     }
 * )
 */
class RecipeOrigin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"reciporigin:list", "reciporigin:read","recipe:read","recipe:list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"reciporigin:list", "reciporigin:read", "recipe:list", "recipe:read"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Recipe::class, mappedBy="origin")
     * @Groups({"reciporigin:list", "reciporigin:read"})
     */
    private $recipies;

    public function __construct()
    {
        $this->recipies = new ArrayCollection();
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

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipies(): Collection
    {
        return $this->recipies;
    }

    public function addRecipy(Recipe $recipy): self
    {
        if (!$this->recipies->contains($recipy)) {
            $this->recipies[] = $recipy;
            $recipy->setOrigin($this);
        }

        return $this;
    }

    public function removeRecipy(Recipe $recipy): self
    {
        if ($this->recipies->removeElement($recipy)) {
            // set the owning side to null (unless already changed)
            if ($recipy->getOrigin() === $this) {
                $recipy->setOrigin(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
