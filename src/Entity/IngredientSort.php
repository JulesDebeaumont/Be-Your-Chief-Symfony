<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\TypeIngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TypeIngredientRepository::class)
 * @ApiFilter(SearchFilter::class, properties=
 *     {
 *     "name" : "partial"
 *     })
 * @ApiResource(
 *     attributes={"order"={"name": "ASC"}},
 *     collectionOperations={
 *          "get"={"groups"={"ingredientSort:list"}}
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"ingredientSort:read"}}
 *          }
 *     }
 * )
 */
class IngredientSort
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"ingredientsort:list", "ingredient:list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     * @Groups({"ingredientsort:list", "ingredient:list"})
     *
     * @ORM\Column(type="string", length=50)
     * @Groups({"ingredientSort:list", "ingredientSort:read"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Ingredient::class, mappedBy="sort")
     * @Groups({"ingredientSort:list", "ingredientSort:read", "ingredient:read"})
     */
    private $ingredients;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
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

    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredients->contains($ingredient)) {
            $this->ingredients[] = $ingredient;
            $ingredient->setSort($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredients->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getSort() === $this) {
                $ingredient->setSort(null);
            }
        }

        return $this;
    }
}
