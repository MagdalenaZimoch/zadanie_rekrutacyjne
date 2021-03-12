<?php

require_once 'Config/autoload.php';

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) and filter_var($_POST['firstname'], FILTER_SANITIZE_STRING)) 
{
    $user = new User($_POST['firstname'],$_POST['email']);
    $db = new DatabaseManager();
    
    $db->insert_user($user->getFirstname(), $user->getEmail());
} 
else 
{
    echo "Zapis do newslettera się nie powiódł, imię lub email są niepoprawne!";
}
    

?>