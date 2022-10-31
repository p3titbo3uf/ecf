<?php

namespace App\Entity;

use App\Repository\ClientsGrantsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsGrantsRepository::class)]
class ClientsGrants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $client = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Branches $branch = null;

    #[ORM\Column(length: 255)]
    private ?string $perms = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getBranch(): ?Branches
    {
        return $this->branch;
    }

    public function setBranch(?Branches $branch): self
    {
        $this->branch = $branch;

        return $this;
    }

    public function getPerms(): ?string
    {
        return $this->perms;
    }

    public function setPerms(string $perms): self
    {
        $this->perms = $perms;

        return $this;
    }
}
