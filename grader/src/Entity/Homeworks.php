<?php

namespace App\Entity;

use App\Repository\HomeworksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HomeworksRepository::class)]
class Homeworks
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
    private $task_files_path;

    #[ORM\ManyToOne(targetEntity: Course::class, inversedBy: 'homework')]
    #[ORM\JoinColumn(nullable: false)]
    private $course;

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

    public function getTaskFilesPath(): ?string
    {
        return $this->task_files_path;
    }

    public function setTaskFilesPath(string $task_files_path): self
    {
        $this->task_files_path = $task_files_path;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): self
    {
        $this->course = $course;

        return $this;
    }
}
