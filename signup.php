<?php
    require 'connection.php';
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/ikona.png" />
        <title>Rejestracja</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1><b>Zarejestruj się!</b></h1>
                        <form method="post" action="user_registration_script.php">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nazwa" placeholder="Nazwa" required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div> 
                            <div class="form-group">
                                <input type="password" class="form-control" name="haslo" placeholder="Haslo (min. 6 znaków)" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group"> 
                                <input type="tel" class="form-control" name="kontakt" placeholder="Kontakt" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="miasto" placeholder="Miejscowosc" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="adres_u" placeholder="Adres" required="true">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Zarejestruj">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center>
                   
               </center>
               </div>
           </footer>

        </div>
    </body>
</html>
