<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConfigurationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ConfigurationRepository::class)
 * @ApiResource(
 *
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"configuration:list"}},
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"configuration:read"}}
 *          },
 *          "patch"={
 *              "normalization_context"={"groups"={"configuration:edit"}},
 *              "denormalization_context"={"groups"={"configuration:edit"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          }
 *     }
 * )
 */
class Configuration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"configuration:list", "configuration:read", "configuration:edit"})
     */
    private $theme;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"configuration:list", "configuration:read", "configuration:edit"})
     */
    private $notifComment;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"configuration:list", "configuration:read", "configuration:edit"})
     */
    private $notifTrade;

    /**
     * @ORM\Column(type="boolean")
     */
    private $moderator;

    /**
     * @ORM\OneToOne(targetEntity=Account::class, inversedBy="configuration", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"configuration:list", "configuration:read"})
     */
    private $account;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"configuration:list", "configuration:read", "configuration:edit"})
     */
    private $notifRecip;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?int
    {
        return $this->theme;
    }

    public function setTheme(int $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getNotifComment(): ?bool
    {
        return $this->notifComment;
    }

    public function setNotifComment(bool $notifComment): self
    {
        $this->notifComment = $notifComment;

        return $this;
    }

    public function getNotifTrade(): ?bool
    {
        return $this->notifTrade;
    }

    public function setNotifTrade(bool $notifTrade): self
    {
        $this->notifTrade = $notifTrade;

        return $this;
    }

    public function getModerator(): ?bool
    {
        return $this->moderator;
    }

    public function setModerator(bool $moderator): self
    {
        $this->moderator = $moderator;

        return $this;
    }

    public function getNotifRecip(): ?bool
    {
        return $this->notifRecip;
    }

    public function setNotifRecip(bool $notifRecip): self
    {
        $this->notifRecip = $notifRecip;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(Account $account): self
    {
        $this->account = $account;

        return $this;
    }
}
