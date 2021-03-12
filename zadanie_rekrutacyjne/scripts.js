function input_msg(msg)
{
    switch (msg) 
    {
        case 'firstname_msg':
            document.getElementById('firstname_msg').textContent = "Wpisz swoje imie, np. Jan";
            document.getElementById('email_msg').textContent = "";
            break;
        case 'email_msg':
            document.getElementById('email_msg').textContent = "Wpisz adres email, np. jan.kowalski@gmail.com"
            document.getElementById('firstname_msg').textContent = "";
            break;
        default:
            document.getElementById('firstname_msg').textContent = ""
            document.getElementById('email_msg').textContent = ""
            break;
    }           
}
                
