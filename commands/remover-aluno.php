<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$emf = new EntityManagerFactory();
$em = $emf->getEntityManager();

$id = $argv[1];
$aluno = $em->getReference(Aluno::class, $id); //! o doctrine busca o aluno e instancia

$em->remove($aluno);

$em->flush();
