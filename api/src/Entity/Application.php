<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationRepository::class)
 */
class Application
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
     * @ORM\Column(type="boolean")
     */
    private bool $processed;

    /**
     * @ORM\ManyToOne(targetEntity=Vacancy::class, inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private Vacancy $vacancy;

    public function __construct(string $name, bool $processed, Vacancy $vacancy)
    {
        $this->name = $name;
        $this->processed = $processed;
        $this->vacancy = $vacancy;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProcessed(): bool
    {
        return $this->processed;
    }

    public function getVacancy(): Vacancy
    {
        return $this->vacancy;
    }

    public function setVacancy(Vacancy $vacancy): self
    {
        $this->vacancy = $vacancy;

        return $this;
    }
}
