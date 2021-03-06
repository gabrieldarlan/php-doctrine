<?php

use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$emf = new EntityManagerFactory();
$em = $emf->getEntityManager();
$alunosRepository = $em->getRepository(Aluno::class);

$degugStack = new DebugStack();
$em->getConfiguration()->setSQLLogger($degugStack);

/** @var Aluno[] $alunos */
$alunos = $alunosRepository->findAll();

foreach ($alunos as $aluno) {

    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })->toArray();

    echo "ID: {$aluno->getId()}\n";
    echo "Nome: {$aluno->getNome()}\n";
    echo "Telefones: " . implode(",", $telefones) . "\n";
    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "\tID curso: {$curso->getId()}\n";
        echo "\tCurso: {$curso->getNome()}\n";
        echo "\n";
    }
    echo "\n";
}

print_r($degugStack);