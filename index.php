<?php
$config = require __DIR__ . '/config.php';
require_once __DIR__ . '/src/ConnexionBdd.php';
require_once __DIR__ . '/src/TableTexte.php';

try {
    $connexionBdd = new ConnexionBdd($config);
    $p = $connexionBdd->creerPdo();
} catch (PDOException $e) {
    echo 'Erreur lors de la connexion à la BDD : ' . $e->getMessage();
    exit();
}

require_once __DIR__ . '/migrate.php';
runMigrations($p);

$tableTexte = new TableTexte($p);
$rows = $tableTexte->recupererTout();

require __DIR__ . '/views/index.view.php';