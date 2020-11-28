<?php

namespace App\Controller;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VacancyController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private Connection $connection;

    public function __construct(EntityManagerInterface $entityManager, Connection $connection)
    {
        $this->entityManager = $entityManager;
        $this->connection = $connection;
    }

    /**
     * @Route("/vacancies", name="vacancies")
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $limit = $request->query->get('limit', 50);
        $offset = $request->query->get('offset', 0);

        $vacancies = $this->findVacancies($limit, $offset);

        return $this->json([
            'data' => array_map(
                fn(array $vacancy) => array_merge(
                    $vacancy,
                    ['skills' => $this->findSkills($vacancy['id'])]
                ),
                $vacancies
            ),
        ]);
    }

    private function findVacancies(int $limit, int $offset): array
    {
        return $this->connection->executeQuery(
            sprintf(
                'select v.*, 
                count(a.id) filter (where a.processed = true) as processed_count, 
                count(a.id) filter (where a.processed = false) as unprocessed_count
                from vacancy v 
                join application a on a.vacancy_id = v.id
                group by v.id
                order by v.created_at desc, unprocessed_count DESC
                LIMIT %d OFFSET %d',
                $limit, $offset
            )
        )->fetchAllAssociative();
    }

    private function findSkills(int $vacancyId): array
    {
        return $this->connection->executeQuery(
            sprintf(
                'select s.id, s.name
                from vacancy_skill vs 
                join skill s on vs.skill_id = s.id
                where vs.vacancy_id = %d
                order by s.name ASC',
                $vacancyId
            )
        )->fetchAllAssociative();
    }
}
