<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"menu:list"}}
 *          },
 *          "post"={
 *              "normalization_context"={"groups"={"menu:create"}},
 *              "denormalization_context"={"groups"={"menu:create"}},
 *              "security"="is_granted('ROLE_USER')"
 *          },
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"menu:read"}}
 *          },
 *          "patch"={
 *              "normalization_context"={"groups"={"menu:edit"}},
 *              "denormalization_context"={"groups"={"menu:edit"}},
 *              "security"="is_granted('ROLE_USER')"
 *          },
 *          "delete"={
 *              "normalization_context"={"groups"={"menu:delete"}},
 *              "denormalization_context"={"groups"={"menu:delete"}},
 *              "security"="is_granted('ROLE_USER')"
 *          },
 *
 *     }
 * )
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"menu:list", "menu:read", "menu:create"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"menu:list", "menu:read", "menu:create", "menu:edit", "menu:delete"})
     */
    private $dateMenu;

    /**
     * @ORM\ManyToOne(targetEntity=MenuType::class, inversedBy="menus")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"menu:list", "menu:read","menu:create", "menu:edit"})
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="menus")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"menu:list", "menu:read", "merchant:read" , "person:read", "menu:create"})
     */
    protected $account;

    /**
     * @ORM\ManyToMany(targetEntity=Recipe::class)
     * @Groups({"menu:list", "menu:read", "merchant:read" , "person:read", "menu:create"})
     */
    private $recipe;

    public function __construct()
    {
        $this->recipe = new ArrayCollection();
    }

    public function getType(): ?MenuType
    {
        return $this->type;
    }

    public function setType(?MenuType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateMenu(): ?\DateTimeInterface
    {
        return $this->dateMenu;
    }

    public function setDateMenu(\DateTimeInterface $dateMenu): self
    {
        $this->dateMenu = $dateMenu;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return Collection|Recipe[]
     */
    public function getRecipe(): Collection
    {
        return $this->recipe;
    }

    public function addRecipe(Recipe $recipe): self
    {
        if (!$this->recipe->contains($recipe)) {
            $this->recipe[] = $recipe;
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): self
    {
        $this->recipe->removeElement($recipe);

        return $this;
    }
}
