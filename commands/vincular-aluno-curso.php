<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$emf = new EntityManagerFactory();
$em = $emf->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];

/**
 * @var Curso $curso
 */
$curso = $em->find(Curso::class, $idCurso);
/**
 * @var Aluno $aluno
 */
$aluno = $em->find(Aluno::class, $idAluno);

$curso->addAluno($aluno);

$em->flush();
