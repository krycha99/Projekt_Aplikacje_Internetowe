<?php
require 'connection.php';
require_once "./funkcje/database_functions.php";
require_once 'header.php';
require_once './PHPMailer/PHPMailerAutoload.php';

 

$result=$con->query("SELECT email From users where id =".$_SESSION['id'].";");


 $body = "Witam! <br><br> Dziękujemy za wybór naszej platformy! Twoje zamówienie zostalo oddane do realizacji.<br><br>Zamówiono:<br>";
		    	foreach($_SESSION['cart'] as $ptid => $qty){
					$conn = db_connect();
					$produkt = mysqli_fetch_assoc(getProduktById($conn, $ptid));
			
                
                $body .= $produkt['nazwa_produktu']."<br>";
                }
				
				$body .="<br> Do zapłaty: <br>";
				$body .= ($_SESSION['total_price']+ 20)."$<br>";
$body .="<br><br>Pozdrawiamy, obsługa platformy";

while($tab=mysqli_fetch_array($result))
{
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->isHTML(true);
$mail->Username = 'platformasprzedazowaa@gmail.com';
$mail->Password = 'platforma105haslo!';
$mail->setFrom('Sklep@sklep.pl');
$mail->Subject = 'Potwierdzenie zamówienia';
$mail->Body = $body;
$mail->AddAddress($tab['email']);
$mail->Send();


}

?>