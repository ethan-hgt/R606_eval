<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MigrationsTest extends TestCase
{
    private $pdo;
    private $rootDir;

    protected function setUp(): void
    {
        $this->rootDir = dirname(__DIR__, 2);
        $this->pdo = new \PDO("sqlite::memory:");
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }

    public function testTableCreation(): void
    {
        $migration = require $this->rootDir . '/migrations/001_create_db_table.php';
        $migration['up']($this->pdo);

        $tables = $this->pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='db_table'")->fetchAll();
        
        $this->assertCount(1, $tables);
    }

    public function testDataSeeding(): void
    {
        $migration1 = require $this->rootDir . '/migrations/001_create_db_table.php';
        $migration1['up']($this->pdo);

        $migration2 = require $this->rootDir . '/migrations/002_seed_data.php';
        $migration2['up']($this->pdo);

        $data = $this->pdo->query("SELECT COUNT(*) as count FROM db_table")->fetch();
        
        $this->assertEquals(4, $data['count']);
    }
}
