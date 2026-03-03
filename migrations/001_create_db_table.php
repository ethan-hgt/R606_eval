<?php

return [
    'up' => function($pdo) {
        $pdo->exec('CREATE TABLE IF NOT EXISTS db_table (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            text VARCHAR(100) NOT NULL
        )');
    },
    'down' => function($pdo) {
        $pdo->exec('DROP TABLE IF EXISTS db_table');
    }
];
