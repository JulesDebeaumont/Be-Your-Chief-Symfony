<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 * @Vich\Uploadable
 * @ApiFilter(SearchFilter::class, properties=
 *     {
 *     "name" : "partial"
 *     })
 * @ApiResource(
 *     attributes={
 *          "order"={"name": "ASC"},
 *          "force_eager"=false
 *     },
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"recipe:list"}}
 *          },
 *          "post"={
 *              "normalization_context"={"groups"={"recipe:list"}},
 *              "denormalization_context"={"groups"={"recipe:create"}},
 *              "security"="is_granted('ROLE_USER')"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"recipe:read"}, "enable_max_depth"=true}
 *          },
 *          "patch"={
 *              "normalization_context"={"groups"={"recipe:edit"}},
 *              "denormalization_context"={"groups"={"recipe:edit"}},
 *              "security"="is_granted('ROLE_USER')"
 *          },
 *          "delete"={
 *              "normalization_context"={"groups"={"recipe:delete"}},
 *              "denormalization_context"={"groups"={"recipe:delete"}},
 *              "security"="is_granted('ROLE_USER')"
 *          },
 *     }
 * )
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"recipe:list", "recipe:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete", "menu:list"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete"})
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete"})
     */
    private $prepTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete"})
     */
    private $cookTime;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete"})
     */
    private $servingNb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete"})
     */
    private $note;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete"})
     */
    private $difficulty;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:edit", "recipe:delete"})
     */
    private $priceLvl;

    /**
     * @MaxDepth(1)
     * @ORM\OneToMany(targetEntity=Quantity::class, mappedBy="recipe", orphanRemoval=true, cascade={"persist"})
     * @Groups({"recipe:list", "recipe:read", "recipe:create"})
     */
    private $quantities;

    /**
     * @MaxDepth(1)
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="recipe", orphanRemoval=true, cascade={"persist"})
     * @Groups({"recipe:list", "recipe:read", "recipe:create"})
     */
    private $comments;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=RecipeOrigin::class, inversedBy="recipies")
     * @Groups({"recipe:list", "recipe:read", "recipe:create"})
     */
    private $origin;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=RecipeType::class, inversedBy="recipies")
     * @Groups({"recipe:list", "recipe:read", "recipe:create"})
     */
    private $type;

    /**
     * @MaxDepth(1)
     * @ORM\ManyToOne(targetEntity=RecipeRegimen::class, inversedBy="recipies")
     * @Groups({"recipe:list", "recipe:read", "recipe:create"})
     */
    private $regimen;

    /**
     * @MaxDepth(2)
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="recipes")
     * @Groups({"recipe:list", "recipe:read"})
     */
    private $account;

    /**
     * @MaxDepth(1)
     * @ORM\OneToMany(targetEntity=Step::class, mappedBy="recipe", orphanRemoval=true, cascade={"persist"})
     * @Groups({"recipe:list", "recipe:read", "recipe:create"})
     */
    private $steps;

    /**
     * @MaxDepth(1)
     * @ORM\OneToMany(targetEntity=MenuType::class, mappedBy="recipe")
     * @Groups({"recipe:list", "recipe:read", "recipe:create"})
     */
    private $menuType;

    /**
     * @ORM\ManyToMany(targetEntity=Account::class, mappedBy="favorites", cascade={"persist"})
     */
    private $accountsFavorite;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"recipe:list", "recipe:read", "menu:list"})
     */
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="recipes_images", fileNameProperty="imageName")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"recipe:list", "recipe:read", "recipe:create", "recipe:put", "recipe:edit"})
     */
    private $updatedAt;

    public function __construct()
    {
        $this->quantities = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->steps = new ArrayCollection();
        $this->menuType = new ArrayCollection();
        $this->accountsFavorite = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrepTime(): ?int
    {
        return $this->prepTime;
    }

    public function setPrepTime(?int $prepTime): self
    {
        $this->prepTime = $prepTime;

        return $this;
    }

    public function getCookTime(): ?int
    {
        return $this->cookTime;
    }

    public function setCookTime(?int $cookTime): self
    {
        $this->cookTime = $cookTime;

        return $this;
    }

    public function getServingNb(): ?int
    {
        return $this->servingNb;
    }

    public function setServingNb(int $servingNb): self
    {
        $this->servingNb = $servingNb;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getPriceLvl(): ?int
    {
        return $this->priceLvl;
    }

    public function setPriceLvl(?int $priceLvl): self
    {
        $this->priceLvl = $priceLvl;

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
            $quantity->setRecipe($this);
        }

        return $this;
    }

    public function removeQuantity(Quantity $quantity): self
    {
        if ($this->quantities->removeElement($quantity)) {
            // set the owning side to null (unless already changed)
            if ($quantity->getRecipe() === $this) {
                $quantity->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setRecipe($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRecipe() === $this) {
                $comment->setRecipe(null);
            }
        }

        return $this;
    }

    public function getOrigin(): ?RecipeOrigin
    {
        return $this->origin;
    }

    public function setOrigin(?RecipeOrigin $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getType(): ?RecipeType
    {
        return $this->type;
    }

    public function setType(?RecipeType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRegimen(): ?RecipeRegimen
    {
        return $this->regimen;
    }

    public function setRegimen(?RecipeRegimen $regimen): self
    {
        $this->regimen = $regimen;

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
     * @return Collection|Step[]
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(Step $step): self
    {
        if (!$this->steps->contains($step)) {
            $this->steps[] = $step;
            $step->setRecipe($this);
        }

        return $this;
    }

    public function removeStep(Step $step): self
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getRecipe() === $this) {
                $step->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MenuType[]
     */
    public function getMenuType(): Collection
    {
        return $this->menuType;
    }

    public function addMenuType(MenuType $menuType): self
    {
        if (!$this->menuType->contains($menuType)) {
            $this->menuType[] = $menuType;
            $menuType->setRecipe($this);
        }

        return $this;
    }

    public function removeMenuType(MenuType $menuType): self
    {
        if ($this->menuType->removeElement($menuType)) {
            // set the owning side to null (unless already changed)
            if ($menuType->getRecipe() === $this) {
                $menuType->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Account[]
     */
    public function getAccountsFavorite(): Collection
    {
        return $this->accountsFavorite;
    }

    public function addAccountsFavorite(Account $accountsFavorite): self
    {
        if (!$this->accountsFavorite->contains($accountsFavorite)) {
            $this->accountsFavorite[] = $accountsFavorite;
            $accountsFavorite->addFavorite($this);
        }

        return $this;
    }

    public function removeAccountsFavorite(Account $accountsFavorite): self
    {
        if ($this->accountsFavorite->removeElement($accountsFavorite)) {
            $accountsFavorite->removeFavorite($this);
        }

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime();
        }

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
