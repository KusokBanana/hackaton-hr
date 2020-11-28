<?php

namespace App\Entity;

use App\Repository\VacancyRepository;
use Assert\Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

class CandidateStatuses
{
    public const STATUS_INITIAL = 'initial';
    public const STATUS_RESPONDED = 'responded';
    public const STATUS_TASK_ON_CHECK = 'task_on_check';

    private const STATUSES = [
        self::STATUS_INITIAL,
        self::STATUS_RESPONDED,
        self::STATUS_TASK_ON_CHECK,
    ];

    public static function validate(string $status): void
    {
        Assert::that($status)->inArray(self::STATUSES);
    }
}
