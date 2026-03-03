<?php

class ConnexionBdd
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function creerPdo(): PDO
    {
        $pdo = new PDO(
            $this->config['db_dsn'],
            $this->config['db_user'],
            $this->config['db_password']
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}
