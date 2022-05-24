<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(
    collectionOperations: ['get' => ['normalization_context' => ['groups' => 'user:list']]],
    itemOperations: ['get' => ['normalization_context' => ['groups' => 'user:item']]],
    order: ['last_name' => 'DESC', 'login' => 'ASC'],
    paginationEnabled: false,
)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['user:list', 'user:item'])]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(['user:list', 'user:item'])]
    private $last_name;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(['user:list', 'user:item'])]
    private $name;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(['user:list', 'user:item'])]
    private $patronymic;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['user:list', 'user:item'])]
    private $login;

    #[ORM\Column(type: 'string', length: 50)]
    #[Groups(['user:list', 'user:item'])]
    private $password;

    #[ORM\Column(type: 'date')]
    #[Groups(['user:list', 'user:item'])]
    private $registration_date;

    #[ORM\Column(type: 'string', length: 100)]
    #[Groups(['user:list', 'user:item'])]
    private $email;

    #[ORM\ManyToMany(targetEntity: Course::class, mappedBy: 'user_id')]
    #[Groups(['user:list', 'user:item'])]
    private $courses;

    #[ORM\ManyToMany(targetEntity: Role::class, inversedBy: 'users')]
    #[Groups(['user:list', 'user:item'])]
    private $role;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

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

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(string $patronymic): self
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registration_date;
    }

    public function setRegistrationDate(\DateTimeInterface $registration_date): self
    {
        $this->registration_date = $registration_date;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->addUserId($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            $course->removeUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Role>
     */
    public function getRole(): Collection
    {
        return $this->role;
    }

    public function addRole(Role $role): self
    {
        if (!$this->role->contains($role)) {
            $this->role[] = $role;
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        $this->role->removeElement($role);

        return $this;
    }
}
