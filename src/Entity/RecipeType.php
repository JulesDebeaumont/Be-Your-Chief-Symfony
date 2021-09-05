<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\RecipeTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RecipeTypeRepository::class)
 * @ApiFilter(SearchFilter::class, properties=
 *     {
 *     "name" : "partial"
 *     })
 * @ApiResource
 *
 *  *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"recipeType:list"}},
 *          }
 *     },
 *          itemOperations={
 *           "get" = {
 *                 "normalization_context"={"group"= {recipeType:read"}}
 * }
 */
class RecipeType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"reciptype:list", "reciptype:read", "recipe:read","recipe:list"})
     */
    private $id;

    /**
     * @Groups({"reciptype:list", "reciptype:read"})
     * @ORM\Column(type="string", length=50)
     * @Groups({"recipe:read","recipe:list"})
     */
    private $name;

    /**
     * @Groups({"reciptype:list", "reciptype:read"})
     * @ORM\OneToMany(targetEntity=Recipe::class, mappedBy="type")
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

    public function setName(string $name): self
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
            $recipy->setType($this);
        }

        return $this;
    }

    public function removeRecipy(Recipe $recipy): self
    {
        if ($this->recipies->removeElement($recipy)) {
            // set the owning side to null (unless already changed)
            if ($recipy->getType() === $this) {
                $recipy->setType(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
