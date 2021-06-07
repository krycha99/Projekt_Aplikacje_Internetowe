<?php
session_start();
 $count = 0;
 
  require_once "./funkcje/database_functions.php";
  $conn = db_connect();
  $row = select4Latest($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/ikona.png" />
        <title>Sklep</title>
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
           <div id="bannerImage" style="background-image: url('img/tak.jpg');">
               <div class="container" >
                   <center>
                   <div id="bannerContent" >
                       <h1>Witaj na naszej platformie!</h1>
					   <h1>Kupuj i sprzedawaj gry i akcesoria!</h1>
                       <a href="produkty.php" class="btn btn-danger">Przejdź do sklepu</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
		  
      <p class="lead text-center text-muted">Najnowsze produkty:</p>
      <div class="row">
        <?php foreach($row as $produkt) { ?>
      	<div class="col-md-3">
      		<a href="produkt.php?id_produktu=<?php echo $produkt['id_produktu']; ?>">
           <img class="img-responsive img-thumbnail" src="./img/<?php echo $produkt['produkt_image']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>
               
           </div>
            <br><br> <br><br><br><br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <a href="index.php" >Powrót na górę strony ^</a>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>