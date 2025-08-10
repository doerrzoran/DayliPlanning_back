<?php

namespace App\Entity;

use App\Repository\PeriodRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodRepository::class)]
class Period
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $start = null;

    #[ORM\Column]
    private ?\DateTime $endPeriod = null;

    #[ORM\ManyToOne(inversedBy: 'periods')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $employe = null;

    #[ORM\ManyToOne]
    private ?TypeAbsence $typeAbsence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?\DateTime
    {
        return $this->start;
    }

    public function setStart(\DateTime $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getEndPeriod(): ?\DateTime
    {
        return $this->endPeriod;
    }

    public function setEndPeriod(\DateTime $endPeriod): static
    {
        $this->endPeriod = $endPeriod;

        return $this;
    }

    public function getEmploye(): ?User
    {
        return $this->employe;
    }

    public function setEmploye(?User $employe): static
    {
        $this->employe = $employe;

        return $this;
    }

    public function getTypeAbsence(): ?TypeAbsence
    {
        return $this->typeAbsence;
    }

    public function setTypeAbsence(?TypeAbsence $typeAbsence): static
    {
        $this->typeAbsence = $typeAbsence;

        return $this;
    }
}
