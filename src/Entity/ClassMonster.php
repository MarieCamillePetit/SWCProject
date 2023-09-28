<?php

namespace App\Entity;

use App\Repository\ClassMonsterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassMonsterRepository::class)]
class ClassMonster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $class = null;

    #[ORM\OneToMany(mappedBy: 'class', targetEntity: Monster::class)]
    private Collection $monsterName;

    public function __construct()
    {
        $this->monsterName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): static
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getMonsterName(): Collection
    {
        return $this->monsterName;
    }

    public function addMonsterName(Monster $monsterName): static
    {
        if (!$this->monsterName->contains($monsterName)) {
            $this->monsterName->add($monsterName);
            $monsterName->setClass($this);
        }

        return $this;
    }

    public function removeMonsterName(Monster $monsterName): static
    {
        if ($this->monsterName->removeElement($monsterName)) {
            // set the owning side to null (unless already changed)
            if ($monsterName->getClass() === $this) {
                $monsterName->setClass(null);
            }
        }

        return $this;
    }
}
