<?php

namespace App\Entity;

use App\Repository\AttributeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributeRepository::class)]
class Attribute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $attribut = null;

    #[ORM\OneToMany(mappedBy: 'attribute', targetEntity: Monster::class)]
    private Collection $monstersName;

    public function __construct()
    {
        $this->monstersName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttribut(): ?string
    {
        return $this->attribut;
    }

    public function setAttribut(string $attribut): static
    {
        $this->attribut = $attribut;

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getMonstersName(): Collection
    {
        return $this->monstersName;
    }

    public function addMonstersName(Monster $monstersName): static
    {
        if (!$this->monstersName->contains($monstersName)) {
            $this->monstersName->add($monstersName);
            $monstersName->setAttribute($this);
        }

        return $this;
    }

    public function removeMonstersName(Monster $monstersName): static
    {
        if ($this->monstersName->removeElement($monstersName)) {
            // set the owning side to null (unless already changed)
            if ($monstersName->getAttribute() === $this) {
                $monstersName->setAttribute(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->attribut; // Remplacer champ par une propriété "string" de l'entité
    }
}
