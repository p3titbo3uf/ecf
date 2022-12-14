<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $secret = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $active = false;

    #[ORM\Column(length: 255)]
    private ?string $short_description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $full_description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(length: 255)]
    private ?string $dpo = null;

    #[ORM\Column(length: 255)]
    private ?string $technical_contact = null;

    #[ORM\Column(length: 255)]
    private ?string $commercial_contact = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Branches::class)]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: 'id', name: 'branches')]
    private Collection $branches;

    public function __construct()
    {
        $this->branches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSecret(): ?string
    {
        return $this->secret;
    }

    public function setSecret(string $secret): self
    {
        $this->secret = $secret;

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

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getSwitchActive(string $id): self
    {
        $this->isActive() === true ? $this->setActive(false) : $this->setActive(true);

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->full_description;
    }

    public function setFullDescription(string $full_description): self
    {
        $this->full_description = $full_description;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(?string $logo_url): self
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDpo(): ?string
    {
        return $this->dpo;
    }

    public function setDpo(string $dpo): self
    {
        $this->dpo = $dpo;

        return $this;
    }

    public function getTechnicalContact(): ?string
    {
        return $this->technical_contact;
    }

    public function setTechnicalContact(string $technical_contact): self
    {
        $this->technical_contact = $technical_contact;

        return $this;
    }

    public function getCommercialContact(): ?string
    {
        return $this->commercial_contact;
    }

    public function setCommercialContact(string $commercial_contact): self
    {
        $this->commercial_contact = $commercial_contact;

        return $this;
    }

    /**
     * @return Collection<int, Branches>
     */
    public function getBranches(): Collection
    {
        return $this->branches;
    }

    public function addBranch(Branches $branch): self
    {
        if (!$this->branches->contains($branch)) {
            $this->branches->add($branch);
            $branch->setClient($this);
        }

        return $this;
    }

    // public function removeBranch(Branches $branch): self
    // {
    //     if ($this->branches->removeElement($branch)) {
    //         // set the owning side to null (unless already changed)
    //         if ($branch->getClient() === $this) {
    //             $branch->setClient(null);
    //         }
    //     }

    //     return $this;
    // }
}
