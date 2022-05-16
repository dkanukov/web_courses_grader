<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $title;

    #[ORM\Column(type: 'string', length: 100)]
    private $description;

    #[ORM\Column(type: 'string', length: 100)]
    private $cover;

    #[ORM\Column(type: 'date')]
    private $open_date;

    #[ORM\Column(type: 'date')]
    private $closing_date;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'courses')]
    private $user_id;

    #[ORM\OneToMany(mappedBy: 'course', targetEntity: Homeworks::class)]
    private $homework;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private $status;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->homework = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getOpenDate(): ?\DateTimeInterface
    {
        return $this->open_date;
    }

    public function setOpenDate(\DateTimeInterface $open_date): self
    {
        $this->open_date = $open_date;

        return $this;
    }

    public function getClosingDate(): ?\DateTimeInterface
    {
        return $this->closing_date;
    }

    public function setClosingDate(\DateTimeInterface $closing_date): self
    {
        $this->closing_date = $closing_date;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        $this->user_id->removeElement($userId);

        return $this;
    }

    /**
     * @return Collection<int, Homeworks>
     */
    public function getHomework(): Collection
    {
        return $this->homework;
    }

    public function addHomework(Homeworks $homework): self
    {
        if (!$this->homework->contains($homework)) {
            $this->homework[] = $homework;
            $homework->setCourse($this);
        }

        return $this;
    }

    public function removeHomework(Homeworks $homework): self
    {
        if ($this->homework->removeElement($homework)) {
            // set the owning side to null (unless already changed)
            if ($homework->getCourse() === $this) {
                $homework->setCourse(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }
}
