<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\QuantityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=QuantityRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "normalization_context"={"groups"={"quantity:create"}},
 *              "denormalization_context"={"groups"={"quantity:create"}},
 *              "security"="is_granted('ROLE_USER')"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"quantity:read"}}
 *          },
 *          "patch"={
 *              "denormalization_context"={"groups"={"quantity:edit"}},
 *              "normalization_context"={"groups"={"quantity:edit"}},
 *              "security"="is_granted('ROLE_USER')"
 *          },
 *          "delete"={
 *              "denormalization_context"={"groups"={"quantity:delete"}},
 *              "normalization_context"={"groups"={"quantity:delete"}},
 *              "security"="is_granted('ROLE_USER')"
 *          }
 *
 *     }
 * )
 */
class Quantity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"recipe:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"quantity:read", "quantity:edit", "quantity:delete", "recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:put", "recipe:delete"})
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $displayOrder;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="quantities")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"quantity:read", "quantity:list"})
     */
    private $recipe;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="quantities")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"quantity:read", "quantity:edit", "quantity:delete", "recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:put", "recipe:delete"})
     */
    private $ingredient;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups({"quantity:read", "quantity:edit", "quantity:delete", "recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:put", "recipe:delete"})
     */
    private $unit;

    public function __construct()
    {
        $this->displayOrder = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDisplayOrder(): ?int
    {
        return $this->displayOrder;
    }

    public function setDisplayOrder(int $displayOrder): self
    {
        $this->displayOrder = $displayOrder;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }
}
