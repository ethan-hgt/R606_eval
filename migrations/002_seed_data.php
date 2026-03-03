<?php

return [
    'up' => function ($pdo) {
        $stmt = $pdo->prepare('INSERT INTO db_table (text) VALUES (:text)');

        $data = ['azerty', 'abcdef', 'xyz', '123456789'];
        foreach ($data as $text) {
            $stmt->execute([':text' => $text]);
        }
    },
    'down' => function ($pdo) {
        $pdo->exec('DELETE FROM db_table');
    }
];
