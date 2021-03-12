<!doctype html>

<html>
 <head>

    <meta charset="UTF-8">
    <title>Zapis do Newslettera</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts.js" async></script> 

 </head>
 <body>
   
    <fieldset class="container"> 
        <legend>Zapis do Newslettera</legend> 
            <form action="authenticate.php" method="post"> 
                <p> 
                <label>Imię:</label><br>

                <input type="text"
                 name="firstname" id="firstname" 
                 required 
                 pattern="[A-Za-z]{3,32}" 
                 oninput="input_msg('firstname_msg')" /><br>

                <label type="msg" id="firstname_msg"></label><br><br> 

                <label>Email:</label><br>
                
                <!-- dopuszczalne jest zmiana typu na "email", wtedy każda przeglądarka może sprawdzać pole według własnego wzorca, aby ujednolicić użyłam pattern -->
                <input type="text"
                 name="email" id="email" 
                 required
                 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                 oninput="input_msg('email_msg')"/><br>

                <label type="msg" id="email_msg"></label><br><br> 

                <input type="submit" name=submit value="Zapisz mnie!"/> 
            </form> 
    </fieldset>  

 </body>
</html>
