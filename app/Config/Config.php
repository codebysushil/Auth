<?php
declare(strict_types=1);

namespace App\Config;

use Dotenv\Dotenv;

class Config
{
    private $pdo;

    public function __construct()
    {
        // Load environment variables
        //$dotenv = Dotenv::createImmutable(__DIR__.'/..');
       // $dotenv->load();

        $driver = getenv('DRIVER') ?: 'mysql';
        $host = getenv('DB_HOST') ?: 'localhost';
        $port = getenv('DB_PORT') ?: '3306';
        $dbname = getenv('DB_NAME') ?: 'test';
        $charset = getenv('DB_CHARSET') ?: 'utf8mb4';
        $username = getenv('DB_USERNAME') ?: 'root';
        $password = getenv('DB_PASSWORD') ?: '';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $dsn = "$driver:host=$host;port=$port;dbname=$dbname;charset=$charset";

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, 'error_log.txt');
            exit('Database connection error.');
        }
    }

    public function getConnection($env)
    {
        $dotenv = Dotenv::createImmutable($env);
        $dotenv->load();
        return $this->pdo;
    }
}

//$config = new Config();
//pdo = $config->getConnection();

