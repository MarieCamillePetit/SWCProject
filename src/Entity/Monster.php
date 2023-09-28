<?php

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $monsterName = null;

    #[ORM\Column]
    private ?int $stat_atk = null;

    #[ORM\Column]
    private ?int $stat_def = null;

    #[ORM\Column]
    private ?int $stat_hp = null;

    #[ORM\Column]
    private ?int $stat_atkspd = null;

    #[ORM\Column]
    private ?float $stat_critrate = null;

    #[ORM\Column]
    private ?float $stat_critdmg = null;

    #[ORM\Column]
    private ?float $stat_accuracy = null;

    #[ORM\Column]
    private ?float $stat_res = null;

    #[ORM\Column]
    private ?float $stat_prec = null;

    #[ORM\Column]
    private ?float $stat_evasion = null;

    #[ORM\ManyToOne(inversedBy: 'monstersName')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Attribute $attribute = null;

    #[ORM\ManyToOne(inversedBy: 'monsterName')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ClassMonster $class = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonsterName(): ?string
    {
        return $this->monsterName;
    }

    public function setMonsterName(string $monsterName): static
    {
        $this->monsterName = $monsterName;

        return $this;
    }

    public function getStatAtk(): ?int
    {
        return $this->stat_atk;
    }

    public function setStatAtk(int $stat_atk): static
    {
        $this->stat_atk = $stat_atk;

        return $this;
    }

    public function getStatDef(): ?int
    {
        return $this->stat_def;
    }

    public function setStatDef(int $stat_def): static
    {
        $this->stat_def = $stat_def;

        return $this;
    }

    public function getStatHp(): ?int
    {
        return $this->stat_hp;
    }

    public function setStatHp(int $stat_hp): static
    {
        $this->stat_hp = $stat_hp;

        return $this;
    }

    public function getStatAtkspd(): ?int
    {
        return $this->stat_atkspd;
    }

    public function setStatAtkspd(int $stat_atkspd): static
    {
        $this->stat_atkspd = $stat_atkspd;

        return $this;
    }

    public function getStatCritrate(): ?float
    {
        return $this->stat_critrate;
    }

    public function setStatCritrate(float $stat_critrate): static
    {
        $this->stat_critrate = $stat_critrate;

        return $this;
    }

    public function getStatCritdmg(): ?float
    {
        return $this->stat_critdmg;
    }

    public function setStatCritdmg(float $stat_critdmg): static
    {
        $this->stat_critdmg = $stat_critdmg;

        return $this;
    }

    public function getStatAccuracy(): ?float
    {
        return $this->stat_accuracy;
    }

    public function setStatAccuracy(float $stat_accuracy): static
    {
        $this->stat_accuracy = $stat_accuracy;

        return $this;
    }

    public function getStatRes(): ?float
    {
        return $this->stat_res;
    }

    public function setStatRes(float $stat_res): static
    {
        $this->stat_res = $stat_res;

        return $this;
    }

    public function getStatPrec(): ?float
    {
        return $this->stat_prec;
    }

    public function setStatPrec(float $stat_prec): static
    {
        $this->stat_prec = $stat_prec;

        return $this;
    }

    public function getStatEvasion(): ?float
    {
        return $this->stat_evasion;
    }

    public function setStatEvasion(float $stat_evasion): static
    {
        $this->stat_evasion = $stat_evasion;

        return $this;
    }

    public function getAttribute(): ?Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(?Attribute $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getClass(): ?ClassMonster
    {
        return $this->class;
    }

    public function setClass(?ClassMonster $class): static
    {
        $this->class = $class;

        return $this;
    }
}
