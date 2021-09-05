<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PersonRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *          "post"={
 *              "normalization_context"={"groups"={"person:read"}},
 *              "denormalization_context"={"groups"={"person:create"}},
 *              "security" ="(is_granted('ROLE_USER') and object == user ) or is_granted('ROLE_ADMIN') ",
 *          },
 *          "get"={
 *              "normalization_context"={"groups"={"person:read"}}
 *          }
 *     },
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"person:read"}}
 *          },
 *          "patch"={
 *              "normalization_context"={"groups"={"person:read"}},
 *              "denormalization_context"={"groups"={"person:edit"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          },
 *          "delete"={
 *              "normalization_context"={"groups"={"person:read"}},
 *              "denormalization_context"={"groups"={"person:delete"}},
 *              "security"="is_granted('ROLE_USER') and object == user"
 *          }
 *
 *     }
 * )
 */
class Person extends Account
{
    /**
     * @ORM\Column(type="string", length=55)
     * @Groups ({"person:read", "person:edit", "person:delete", "person:create"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     * @Groups ({"person:read", "person:edit", "person:delete", "person:create"})
     */
    private $lastName;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
