<?php

include "Config/wp-config.php";

class DatabaseManager
{
    private $conn;
    

    public function insert_user(string $firstname,string $email)
    {
        $result = $this->select_email($email);

        if(mysqli_num_rows($result) > 0)
        {
            $this->getInfoMessage();
        }
        else
        {
            if($stmt = $this->conn->prepare('INSERT INTO '. TABLE_NAME ." (firstname,email) VALUES (AES_ENCRYPT(? ,'smart_firstname' ), AES_ENCRYPT(? ,'smart_email'))"))
            {
                $stmt->bind_param('ss',$firstname, $email);
                $stmt->execute();

                if($stmt->get_result())
                {
                    $this->getErrorMessage();
                }
                else
                {
                    $this->getSuccesMessage();
                }
            }
            else
            {
                $this->getErrorMessage();
            }
        }
    }// insert_user(string $firstname,string $email)

    private function getErrorMessage()
    {
        echo 'Przepraszamy, obecnie zapis do newslettera jest niemożliwy, spróbuj później :)';
    }// getErrorMessage()

    private function getSuccesMessage()
    {
        echo 'Dziękujemy, pomyślnie zapisałeś się do naszego newslettera :)';
    }// getSuccesMessage()

    private function getInfoMessage()
    {
        echo 'Znaleźliśmy Twój adres email w naszej bazie, wygląda na to, że jesteś już zapisany do naszego newslettera :)';
    }// getInfoMessage()

    private function connect()
    {
        $this->conn = mysqli_connect(SERVER_NAME, USER_NAME, USER_PASSWORD, DB_NAME);
        
        if(!$this->conn)
        {
            $this->getErrorMessage();
        }
    }// connect()
    
    private function disconnect()
    {
        $this->conn->close();
    }// disconnect()

    private function select_email(string $email)
    {        
        if ($stmt = $this->conn->prepare('SELECT email FROM '. TABLE_NAME . " WHERE email = AES_ENCRYPT( ?, 'smart_email')")) 
        {
	        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username 
            // is a string so we use "s"
	        $stmt->bind_param('s', $email);
	        $stmt->execute();
            return $stmt->get_result();
        }
        else
        {
            $this->getErrorMessage();
        }
    }//  select_email(string $email)

    function __construct()
    {
        try
        {
            $this->connect();
        }
        catch (Exception $e)
        {
            $this->getErrorMessage(); 
        }
    }// __construct()

    function __destruct()
    {
        $this->disconnect();
    }// __destruct()
    
}// class DatabaseManager


?>