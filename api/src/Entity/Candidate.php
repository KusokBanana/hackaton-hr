<?php

namespace App\Entity;

use App\Repository\CandidateRepository;
use Assert\Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidateRepository::class)
 */
class Candidate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private string $sex;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $city;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private ?\DateTimeInterface $birthDate;

    /**
     * @ORM\Column(type="text")
     */
    private string $title;

    /**
     * @ORM\Column(type="array_specialization")
     * @var Specialization[]
     */
    private array $specialization;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $salary;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private string $education;

    /**
     * @ORM\Column(type="array_education_history")
     * @var EducationHistory[]
     */
    private array $educationHistory;

    /**
     * @ORM\Column(type="array_experience")
     * @var Experience[]
     */
    private array $experience;

    /**
     * @ORM\Column(type="simple_array")
     */
    private array $languages;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $about;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $status;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class)
     */
    private Collection $skills;

    /**
     * @ORM\OneToMany(targetEntity=Relevance::class, mappedBy="candidate", orphanRemoval=true)
     */
    private Collection $relevance;

    /**
     * @ORM\OneToOne(targetEntity=Relevance::class, cascade={"persist", "remove"})
     */
    private ?Relevance $mostRelevant;

    public function __construct(
        string $name,
        string $sex,
        ?string $city,
        ?\DateTimeInterface $birthDate,
        string $title,
        array $specialization,
        ?int $salary,
        string $education,
        array $educationHistory,
        array $experience,
        array $languages,
        ?string $about,
        array $skills
    )
    {
        Assert::thatAll($skills)->isInstanceOf(Skill::class);
        Assert::thatAll($experience)->isInstanceOf(Experience::class);
        Assert::thatAll($specialization)->isInstanceOf(Specialization::class);
        Assert::thatAll($educationHistory)->isInstanceOf(EducationHistory::class);

        $this->name = $name;
        $this->sex = $sex;
        $this->city = $city;
        $this->birthDate = $birthDate;
        $this->title = $title;
        $this->specialization = $specialization;
        $this->salary = $salary;
        $this->education = $education;
        $this->educationHistory = $educationHistory;
        $this->experience = $experience;
        $this->languages = $languages;
        $this->about = $about;
        $this->skills = new ArrayCollection($skills);
        $this->relevance = new ArrayCollection();
        $this->status = CandidateStatuses::STATUS_INITIAL;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSpecialization(): array
    {
        return $this->specialization;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }
    public function getEducation(): string
    {
        return $this->education;
    }

    public function getEducationHistory(): array
    {
        return $this->educationHistory;
    }

    public function getExperience(): array
    {
        return $this->experience;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @return Skill[]
     */
    public function getSkills(): array
    {
        return $this->skills->toArray();
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
            $relevance->setCandidate($this);
        }

        return $this;
    }

    public function removeRelevance(Relevance $relevance): self
    {
        if ($this->relevance->removeElement($relevance)) {
            // set the owning side to null (unless already changed)
            if ($relevance->getCandidate() === $this) {
                $relevance->setCandidate(null);
            }
        }

        return $this;
    }

    public function getMostRelevant(): ?Relevance
    {
        return $this->mostRelevant;
    }

    public function hasMostRelevant(): bool
    {
        return $this->mostRelevant instanceof Relevance;
    }

    public function setMostRelevant(?Relevance $mostRelevant): self
    {
        $this->mostRelevant = $mostRelevant;

        return $this;
    }
}
