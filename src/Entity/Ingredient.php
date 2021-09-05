<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\IngredientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=IngredientsRepository::class)
 * @ApiFilter(SearchFilter::class, properties=
 *     {
 *     "name" : "partial"
 *     })
 * @ApiResource(
 *     attributes={"order"={"name": "ASC"}},
 *     collectionOperations={
 *          "get"={"groups"={"ingredient:list"}}
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"ingredient:read"}}
 *          }
 *     }
 * )
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"ingredient:list", "ingredient:read", "recipe:list", "recipe:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"ingredient:list", "ingredient:read", "recipe:list", "recipe:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"ingredient:list", "ingredient:read"})
     */
    private $nbKal;

    /**
     * @ORM\OneToMany(targetEntity=Quantity::class, mappedBy="ingredient")
     * @Groups({"ingredient:list", "ingredient:read"})
     */
    private $quantities;

    /**
     * @ORM\ManyToOne(targetEntity=IngredientSort::class, inversedBy="ingredients")
     * @Groups({"ingredient:list", "ingredient:read"})
     */
    private $sort;

    /**
     * @ORM\ManyToMany(targetEntity=Allergen::class, inversedBy="ingredients")
     * @Groups({"ingredient:list", "ingredient:read"})
     */
    private $allergens;

    public function __construct()
    {
        $this->quantities = new ArrayCollection();
        $this->allergens = new ArrayCollection();
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

    public function getNbKal(): ?float
    {
        return $this->nbKal;
    }

    public function setNbKal(?float $nbKal): self
    {
        $this->nbKal = $nbKal;

        return $this;
    }

    /**
     * @return Collection|Quantity[]
     */
    public function getQuantities(): Collection
    {
        return $this->quantities;
    }

    public function addQuantity(Quantity $quantity): self
    {
        if (!$this->quantities->contains($quantity)) {
            $this->quantities[] = $quantity;
            $quantity->setIngredient($this);
        }

        return $this;
    }

    public function removeQuantity(Quantity $quantity): self
    {
        if ($this->quantities->removeElement($quantity)) {
            // set the owning side to null (unless already changed)
            if ($quantity->getIngredient() === $this) {
                $quantity->setIngredient(null);
            }
        }

        return $this;
    }

    public function getSort(): ?IngredientSort
    {
        return $this->sort;
    }

    public function setSort(?IngredientSort $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return Collection|Allergen[]
     */
    public function getAllergens(): Collection
    {
        return $this->allergens;
    }

    public function addAllergen(Allergen $allergen): self
    {
        if (!$this->allergens->contains($allergen)) {
            $this->allergens[] = $allergen;
        }

        return $this;
    }

    public function removeAllergen(Allergen $allergen): self
    {
        $this->allergens->removeElement($allergen);

        return $this;
    }
}
