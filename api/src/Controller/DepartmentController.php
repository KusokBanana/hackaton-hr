<?php

namespace App\Controller;

use App\Entity\Vacancy;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/departments", name="departments")
     */
    public function index(): Response
    {
        $data = $this->entityManager->createQueryBuilder()
            ->distinct()
            ->select('vacancy.department')
            ->from(Vacancy::class, 'vacancy')
            ->orderBy('vacancy.department', 'ASC')
            ->getQuery()->getArrayResult();


        return $this->json([
            'data' => array_column($data, 'department'),
        ]);
    }
}
