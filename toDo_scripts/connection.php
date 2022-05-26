<?php
class Connection {
    private $host = 'localhost';
    private $dbName = 'todolist';
    private $user = 'root';
    private $password = '';

    public function connect() {
        try {
            $connection = new PDO(
                "mysql:host=$this->host;dbname=$this->dbName",
                "$this->user",
                "$this->password"
            );

            return $connection;

        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}

?>