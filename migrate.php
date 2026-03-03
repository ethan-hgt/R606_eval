<?php

function runMigrations($pdo) {
    $pdo->exec('CREATE TABLE IF NOT EXISTS migrations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        migration VARCHAR(255) NOT NULL,
        executed_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )');

    $executedMigrations = $pdo->query('SELECT migration FROM migrations')->fetchAll(PDO::FETCH_COLUMN);

    $migrationFiles = glob(__DIR__ . '/migrations/*.php');
    sort($migrationFiles);

    foreach($migrationFiles as $file) {
        $migrationName = basename($file);
        
        if(in_array($migrationName, $executedMigrations)) {
            continue;
        }

        $migration = require $file;
        $migration['up']($pdo);

        $stmt = $pdo->prepare('INSERT INTO migrations (migration) VALUES (:migration)');
        $stmt->execute([':migration' => $migrationName]);
    }
}
