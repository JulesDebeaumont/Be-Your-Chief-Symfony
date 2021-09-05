<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MenuTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MenuTypeRepository::class)
 * @ApiResource(
 *     attributes={"order"={"name": "ASC"}},
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"menuType:list"}}
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"menuType:read"}}
 *          }
 *     }
 * )
 */
class MenuType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"menuType:list", "menuType:read", "recipe:list", "recipe.read"})     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"menuType:list", "menuType:read", "recipe:list", "recipe.read", "menu:list"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="type")
     * @Groups({"menuType:list", "menuType:read", "recipe:list", "recipe.read"})
     */
    private $menus;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="menuType")
     * @Groups({"menuType:list", "menuType:read"})
     */
    private $recipe;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
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
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setType($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getType() === $this) {
                $menu->setType(null);
            }
        }

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
