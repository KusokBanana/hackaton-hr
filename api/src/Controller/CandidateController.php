<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    private CandidateRepository $candidateRepository;

    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    /**
     * @Route("/candidates", name="candidates")
     */
    public function index(): Response
    {
        $data = $this->candidateRepository->findBy([], ['id' => 'ASC'], 10);

        return $this->json([
            'data' => $data,
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
