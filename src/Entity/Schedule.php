<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 * @ApiResource(
 *     attributes={"order"={"opening": "ASC"}},
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"schedule:list"}}
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"schedule:read"}}
 *          },
 *          "patch"={
 *              "normalization_context"={"groups"={"schedule:edit"}},
 *              "denormalization_context"={"groups"={"schedule:edit"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          },
 *          "delete"={
 *              "normalization_context"={"groups"={"schedule:read"}},
 *              "denormalization_context"={"groups"={"schedule:delete"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          }
 *     }
 * )
 */
class Schedule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $monday;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $tuesday;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $wednesday;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $thursday;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $friday;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $saturday;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Groups ({"merchant:read", "merchant:edit"})
     */
    private $sunday;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonday(): ?string
    {
        return $this->monday;
    }

    public function setMonday(string $monday): self
    {
        $this->monday = $monday;

        return $this;
    }

    public function getTuesday(): ?string
    {
        return $this->tuesday;
    }

    public function setTuesday(string $tuesday): self
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    public function getWednesday(): ?string
    {
        return $this->wednesday;
    }

    public function setWednesday(string $wednesday): self
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    public function getThursday(): ?string
    {
        return $this->thursday;
    }

    public function setThursday(string $thursday): self
    {
        $this->thursday = $thursday;

        return $this;
    }

    public function getFriday(): ?string
    {
        return $this->friday;
    }

    public function setFriday(string $friday): self
    {
        $this->friday = $friday;

        return $this;
    }

    public function getSaturday(): ?string
    {
        return $this->saturday;
    }

    public function setSaturday(string $saturday): self
    {
        $this->saturday = $saturday;

        return $this;
    }

    public function getSunday(): ?string
    {
        return $this->sunday;
    }

    public function setSunday(string $sunday): self
    {
        $this->sunday = $sunday;

        return $this;
    }
}
