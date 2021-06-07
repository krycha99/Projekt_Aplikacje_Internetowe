<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="shortcut icon" href="img/ikona.png" />
    
  </head>

  <body>
<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false" aria-controls="navbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="index.php" class="navbar-brand">Platforma sprzedażowa</a>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
					   
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
						   <li><a href="produkty.php"><span class="glyphicon glyphicon-th"></span> Sklep</a></li>
						   <li><a href="sprzedaz.php"><span class="glyphicon glyphicon-usd"></span> Sprzedaj!</a></li>
                           <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Koszyk</a></li>
                           <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Ustawienia</a></li>
                           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>
                           <?php
                           }else{
                            ?>
							<li><a href="produkty.php"><span class="glyphicon glyphicon-th"></span> Sklep</a></li>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Zarejestruj</a></li>
                           <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Zaloguj</a></li>
                           <?php
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
</nav>

</body>