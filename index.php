<?php

echo "<h1>Exercice de POO : Banque</h1>";

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});

//===================== Titulaires =====================//
$t1 = new Titulaire(1, "PFIFFER", "Kevin", "1994-12-25", "STRASBOURG");
$t2 = new Titulaire(2, "MURMANN", "Mickaël", "1985-10-14", "MULHOUSE");

// //===================== Comptes Bancaires =====================//
$cb1 = new CompteBancaire($t1, "Compte Courant", 1000.50, "EUR");
$cb2 = new CompteBancaire($t1, "Livret A", 2000.50, "EUR");

$cb3 = new CompteBancaire($t2, "Compte Courant", 1500, "EUR");
$cb4 = new CompteBancaire($t2, "Livret A", 5000, "EUR");
$cb5 = new CompteBancaire($t2, "Livret Épargne", 10000, "EUR");

$titulaires = [$t1, $t2];

foreach($titulaires as $titulaire)
{
    echo $titulaire->afficherCompte();
}


echo $cb1->crediter(50);

echo $cb1;

echo "<br>";

// echo $cb1->getInfos();

echo $cb1->debiter(5000);

echo $cb1;

echo $cb1->virement($cb2, 150);


// echo $cb1->getInfos();


?>
