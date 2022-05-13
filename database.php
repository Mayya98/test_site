<?php
class Database {

    // укажите свои собственные учетные данные для базы данных 
    private $host = "localhost";
    private $db_name = "mayya098";
    private $username = "m081098";
    private $password = "m098066arsL";
    public $conn;

    // получение соединения с базой данных 
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch(PDOException $exception) {
            echo "Error of connection: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>