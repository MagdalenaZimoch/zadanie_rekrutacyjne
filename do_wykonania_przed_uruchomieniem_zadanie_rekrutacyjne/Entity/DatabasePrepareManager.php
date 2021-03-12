
<?php
include 'Config/wp-config.php';

class DatabasePrepareManager
{
    private $conn;

    private function connect()
    {
        $this->conn = mysqli_connect(SERVER_NAME, ADMIN_NAME, ADMIN_PASSWORD);

        if(!$this->conn)
        {
            echo 'Wystąpił nieoczekiwany błąd, proszę sprawdzić czy podane wartości w wp-config są prawidłowe';
        }
    }// connect()
    
    private function disconnect()
    {
        $this->conn->close();
    }// disconnect()

    private function useDatabase()
    {
        $sql = 'USE ' . DB_NAME;
        if (!$this->conn->query($sql) === TRUE) 
        {
            echo 'Wystąpił nieoczekiwany błąd, błąd w wybieraniu bazy danych';
        }
    }// useDatabase()

    private function createDatabase()
    { 
        $sql = 'CREATE DATABASE IF NOT EXISTS ' . DB_NAME;
        
        if (!$this->conn->query($sql) === TRUE) 
        {
            echo 'Wystąpił nieoczekiwany błąd, baza danych nie może być stworzona';
        }
    }// createDatabase()

    private function createTableNewsletterData()
    {  
        $sql = 'CREATE TABLE IF NOT EXISTS ' . TABLE_NAME.' (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                datetime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP)';

        if (!$this->conn->query($sql) === TRUE) 
        {
            echo 'Wystąpił nieoczekiwany błąd, tabela nie może być stworzona ';
        }
        
    }// createTableNewsletter()

    function __construct()
    {
        try
        {
            $this->connect();
            $this->createDatabase();
            $this->useDatabase();
            $this->createTableNewsletterData();

            echo 'Baza danych oraz tabela zostały stworzone, proszę przejść do pliku'."<br>".
                 'Zadanie_rekrutacyjne/Config/wp-config.php i wprowadzić dane logowania użytkownika do bazy.'."<br><br>";

            echo 'define("SERVER_NAME", ""); //change to yours server name'."<br>".
                 'define("USER_NAME", ""); // change to yours user name'."<br>".
                 'define("USER_PASSWORD", ""); //change to yours user password'."<br><br>";

            echo ' Użytkownik powinien mieć pozwolenie na SELECT oraz INSERT do '.DB_NAME.'.'.TABLE_NAME."<br>";
        }
        catch (Exception $e)
        {
            echo 'Wystąpił nieoczekiwany błąd, proszę sprawdzić czy podane wartości w wp-config są prawidłowe';  
        }
    }// __construct()

    function __destruct()
    {
         $this->disconnect();
    }// __destruct()
    
}// class DatabaseManager


?>