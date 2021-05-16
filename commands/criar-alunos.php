<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$emf = new EntityManagerFactory();
$em = $emf->getEntityManager();

$aluno = new Aluno();
$aluno->setNome($argv[1]);

for ($i = 2; $i < $argc; $i++) {
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);
    
    
    $aluno->addTelefone($telefone);
}


$em->persist($aluno);

$em->flush();
