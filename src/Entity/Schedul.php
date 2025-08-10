<?php

namespace App\Entity;

use App\Repository\SchedulRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedulRepository::class)]
class Schedul
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $workingDays = [];

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $minArrivalTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $maxArrivalTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $minLunchBreakTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $maxLunchBreakTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $minEndLunchBreakTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $maxEndLunchBreakTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $minEndDayTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $maxEndDayTime = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'schedul')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkingDays(): array
    {
        return $this->workingDays;
    }

    public function setWorkingDays(array $workingDays): static
    {
        $this->workingDays = $workingDays;

        return $this;
    }

    public function getMinArrivalTime(): ?\DateTime
    {
        return $this->minArrivalTime;
    }

    public function setMinArrivalTime(\DateTime $minArrivalTime): static
    {
        $this->minArrivalTime = $minArrivalTime;

        return $this;
    }

    public function getMaxArrivalTime(): ?\DateTime
    {
        return $this->maxArrivalTime;
    }

    public function setMaxArrivalTime(\DateTime $maxArrivalTime): static
    {
        $this->maxArrivalTime = $maxArrivalTime;

        return $this;
    }

    public function getMinLunchBreakTime(): ?\DateTime
    {
        return $this->minLunchBreakTime;
    }

    public function setMinLunchBreakTime(\DateTime $minLunchBreakTime): static
    {
        $this->minLunchBreakTime = $minLunchBreakTime;

        return $this;
    }

    public function getMaxLunchBreakTime(): ?\DateTime
    {
        return $this->maxLunchBreakTime;
    }

    public function setMaxLunchBreakTime(\DateTime $maxLunchBreakTime): static
    {
        $this->maxLunchBreakTime = $maxLunchBreakTime;

        return $this;
    }

    public function getMinEndLunchBreakTime(): ?\DateTime
    {
        return $this->minEndLunchBreakTime;
    }

    public function setMinEndLunchBreakTime(\DateTime $minEndLunchBreakTime): static
    {
        $this->minEndLunchBreakTime = $minEndLunchBreakTime;

        return $this;
    }

    public function getMaxEndLunchBreakTime(): ?\DateTime
    {
        return $this->maxEndLunchBreakTime;
    }

    public function setMaxEndLunchBreakTime(\DateTime $maxEndLunchBreakTime): static
    {
        $this->maxEndLunchBreakTime = $maxEndLunchBreakTime;

        return $this;
    }

    public function getMinEndDayTime(): ?\DateTime
    {
        return $this->minEndDayTime;
    }

    public function setMinEndDayTime(\DateTime $minEndDayTime): static
    {
        $this->minEndDayTime = $minEndDayTime;

        return $this;
    }

    public function getMaxEndDayTime(): ?\DateTime
    {
        return $this->maxEndDayTime;
    }

    public function setMaxEndDayTime(\DateTime $maxEndDayTime): static
    {
        $this->maxEndDayTime = $maxEndDayTime;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setSchedul($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getSchedul() === $this) {
                $user->setSchedul(null);
            }
        }

        return $this;
    }
}
