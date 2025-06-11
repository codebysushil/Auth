<?php declare(strict_types=1);
//namespace config;

class Config
{
    private string $driver = 'mysql';
    private string $host = '127.0.0.1';
    private int $port = 3306;
    private string $dbname = 'auth';
    private string $charset = 'utf8mb4';
    private string $username = 'root';
    private string $password = '';
    private string $dsn;
    public $conn;
    
    private array $options = [
        'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION',
        'PDO::ATTR_DEFAULT_FETCH_MODE' => 'PDO::FETCH_ASSOC',
        'PDO::ATTR_EMULATE_PREPARES' => false,
    ];
    
    public function __construct()
    {
        $this->dsn="$this->driver:host=$this->host;port=$this->port;dbname=$this->dbname;charset=$this->charset;";
        
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password, $this->options);
        } catch (\Throwable $th){
            error_log($th->getMessage());
            $this->conn = null;
            exit();
        }
    }
}