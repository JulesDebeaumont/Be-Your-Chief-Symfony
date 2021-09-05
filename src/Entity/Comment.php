<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ApiResource(
 *     attributes={"order"={"textComment": "ASC"}},
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"comment:list"}}
 *          },
 *          "post"={
 *              "normalization_context"={"groups"={"comment:create"}},
 *              "denormalization_context"={"groups"={"comment:create"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"comment:read"}}
 *          },
 *          "patch"={
 *              "normalization_context"={"groups"={"comment:edit"}},
 *              "denormalization_context"={"groups"={"comment:edit"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          },
 *          "delete"={
 *              "normalization_context"={"groups"={"comment:delete"}},
 *              "denormalization_context"={"groups"={"comment:delete"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          },
 *     }
 * )
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Groups({"comment:list", "comment:read", "comment:create", "comment:edit", "comment:delete"})
     */
    private $textComment;

    /**
     * @ORM\Column(type="date")
     * @Groups({"comment:list", "comment:read"})
     */
    private $dateComment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"comment:list", "comment:read", "comment:create", "comment:edit", "comment:delete"})
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="comments")
     * @Groups({"comment:list", "comment:read"})
     */
    private $account;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="comments")
     * @ORM\JoinColumn  (nullable=false)
     * @Groups({"comment:list", "comment:read"})
     */
    private $recipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextComment(): ?string
    {
        return $this->textComment;
    }

    public function setTextComment(?string $textComment): self
    {
        $this->textComment = $textComment;

        return $this;
    }

    public function getDateComment(): ?\DateTimeInterface
    {
        return $this->dateComment;
    }

    public function setDateComment(\DateTimeInterface $dateComment): self
    {
        $this->dateComment = $dateComment;

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

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

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
        return $this->getTextComment();
    }
}
