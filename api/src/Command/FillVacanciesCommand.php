<?php

namespace App\Command;

use App\Entity\Vacancy;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FillVacanciesCommand extends Command
{
    protected static $defaultName = 'app:fill-vacancies';
    private const FILE_PATH = '/var/www/data/vacancies.csv';

    private Connection $connection;
    private EntityManagerInterface $entityManager;

    public function __construct(
        Connection $connection,
        EntityManagerInterface $entityManager,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->connection = $connection;
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->entityManager->transactional(function() {
            if (($handle = fopen(self::FILE_PATH, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $this->createVacancy($data);
                }
                fclose($handle);
            }
        });

        return Command::SUCCESS;
    }

    private function createVacancy(array $data): void
    {
        $id = $data[0];

        if (!is_numeric($id)) {
            return;
        }

        $description = trim($data[1]);

        $vacancy = new Vacancy($description);
        $this->entityManager->persist($vacancy);
    }
}
