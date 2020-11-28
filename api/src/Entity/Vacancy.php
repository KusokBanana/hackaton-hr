<?php

namespace App\Entity;

use App\Repository\VacancyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacancyRepository::class)
 */
class Vacancy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="text")
     */
    private string $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type="text")
     */
    private string $department;

    /**
     * @ORM\OneToMany(targetEntity=Application::class, mappedBy="vacancy")
     */
    private Collection $applications;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $title;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class)
     */
    private Collection $skills;

    /**
     * @ORM\OneToMany(targetEntity=Relevance::class, mappedBy="vacancy")
     */
    private Collection $relevance;

    public function __construct(string $title, string $description, string $department, \DateTimeInterface $createdAt)
    {
        $this->title = $title;
        $this->description = $description;
        $this->department = $department;
        $this->createdAt = $createdAt;
        $this->applications = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->relevance = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return Application[]
     */
    public function getApplications(): array
    {
        return $this->applications->toArray();
    }

    public function addApplication(Application $application): self
    {
        if (!$this->applications->contains($application)) {
            $this->applications[] = $application;
            $application->setVacancy($this);
        }

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return Skill[]
     */
    public function getSkills(): array
    {
        return $this->skills->toArray();
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    /**
     * @return Relevance[]
     */
    public function getRelevance(): array
    {
        return $this->relevance->toArray();
    }

    public function addRelevance(Relevance $relevance): self
    {
        if (!$this->relevance->contains($relevance)) {
            $this->relevance[] = $relevance;
            $relevance->setVacancy($this);
        }

        return $this;
    }

    public function removeRelevance(Relevance $relevance): self
    {
        if ($this->relevance->removeElement($relevance)) {
            // set the owning side to null (unless already changed)
            if ($relevance->getVacancy() === $this) {
                $relevance->setVacancy(null);
            }
        }

        return $this;
    }
}
