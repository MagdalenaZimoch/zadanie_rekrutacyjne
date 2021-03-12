<?php

class User 
{    
    private string $firstname;
    private string $email;
    
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }// setFirstname(string $firstname)

    public function setEmail(string $email)
    {
        $this->email = $email;
    }//  setEmail(string $email)
    
    public function getFirstname(): string
    {
        return $this->firstname;
    }// getFirstname($firstname): string

    public function getEmail(): string
    {
        return $this->email;
    }// getEmail($email): string

    function __construct(string $firstname,string $email)
    {
        $this->firstname = $firstname;
        $this->email = $email;
    }// __construct($firstname, $email)

    function __destruct(){}// __destruct()
}

?>