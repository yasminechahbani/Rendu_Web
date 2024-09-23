<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $UserNale = null;

    #[ORM\Column]
    private ?int $UserAge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserNale(): ?string
    {
        return $this->UserNale;
    }

    public function setUserNale(string $UserNale): static
    {
        $this->UserNale = $UserNale;

        return $this;
    }

    public function getUserAge(): ?int
    {
        return $this->UserAge;
    }

    public function setUserAge(int $UserAge): static
    {
        $this->UserAge = $UserAge;

        return $this;
    }
}
