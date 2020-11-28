<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Repository\CandidateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    private CandidateRepository $candidateRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(CandidateRepository $candidateRepository, EntityManagerInterface $entityManager)
    {
        $this->candidateRepository = $candidateRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/candidates", name="candidates")
     */
    public function index(Request $request): Response
    {
        $limit = $request->query->get('limit', 50);
        $offset = $request->query->get('offset', 0);

        $expr = $this->entityManager->getExpressionBuilder();

        $queryBuilder = $this->entityManager->createQueryBuilder()
            ->select('candidate')
            ->from(Candidate::class, 'candidate')
            ->orderBy('candidate.id', 'DESC')
            ->leftJoin('candidate.skills', 'skills')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        if ($request->query->has('skills')) {
            $queryBuilder
                ->andWhere($expr->in('skills.id', ':skills'))
                ->setParameter('skills', $request->query->get('skills'))
            ;
        }

        return $this->json([
            'data' => $queryBuilder->getQuery()->getResult(),
        ]);
    }

    /**
     * @Route("/candidates/{id}", name="candidate")
     * @param int $id
     *
     * @return Response
     */
    public function candidate(int $id): Response
    {
        $data = $this->candidateRepository->findOneBy(['id' => $id]);

        return $this->json([
            'data' => $data,
        ]);
    }
}
