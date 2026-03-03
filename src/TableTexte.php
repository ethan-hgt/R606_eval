<?php

class TableTexte
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function recupererTout(): array
    {
        return $this->pdo->query('SELECT id, text FROM db_table')->fetchAll();
    }
}
