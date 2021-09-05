<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StepRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StepRepository::class)
 * @ApiResource(
 *     attributes={"order"={"num": "ASC"}},
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"step:list"}}
 *          },
 *          "post"={
 *              "normalization_context"={"groups"={"step:create"}},
 *              "denormalization_context"={"groups"={"step:create"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"step:read"}}
 *          },
 *          "patch"={
 *              "normalization_context"={"groups"={"step:edit"}},
 *              "denormalization_context"={"groups"={"step:edit"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          },
 *          "delete"={
 *              "normalization_context"={"groups"={"step:delete"}},
 *              "denormalization_context"={"groups"={"step:delete"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          },
 *     }
 * )
 */
class Step
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
     * @Groups({"step:list", "step:read", "step:edit", "step:create", "step:delete", "recipe:read", "recipe:list", "recipe:create", "recipe:put", "recipe:delete", "recipe:delete"})
     */
    private $num;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"step:list", "step:read", "step:edit", "step:create", "step:delete", "recipe:read", "recipe:list", "recipe:create", "recipe:put", "recipe:delete", "recipe:delete"})
     */
    private $descr;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"step:list", "step:read", "step:edit", "step:create", "step:delete", "recipe:read", "recipe:list", "recipe:create", "recipe:put", "recipe:delete", "recipe:delete"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="steps")
     * @Groups({"step:list", "step:read"})
     */
    private $recipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(?string $descr): self
    {
        $this->descr = $descr;

        return $this;
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

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
