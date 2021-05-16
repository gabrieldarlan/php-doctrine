<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$emf = new EntityManagerFactory();
$em = $emf->getEntityManager();
//!uma forma de recuperar o aluno é usando o repositorio 
//!$alunoRepository = $em->getRepository(Aluno::class);


$id = $argv[1];
$novoNome = $argv[2];

//! $aluno = $alunoRepository->find($id);
$aluno = $em->find(Aluno::class, $id);
$aluno->setNome($novoNome);

$em->flush();
