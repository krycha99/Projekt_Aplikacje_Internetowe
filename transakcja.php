<?php
	session_start();

	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: zakup.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./funkcje/database_functions.php";
	
	$title = "Zatwierdzanie zakupu";
	require "./header.php";
	
	
	
	$conn = db_connect();
	extract($_SESSION['ship']);

	$card_number = $_POST['card_number'];
	$card_PID = $_POST['card_PID'];
	$card_expire = strtotime($_POST['card_expire']);
	$card_owner = $_POST['card_owner'];

	$id_klienta = getKlientId($imie_nazwisko, $adres, $miejscowosc, $kod_poczt, $kraj);
	if($id_klienta == null) {
	
		$id_klienta = setKlientId($imie_nazwisko, $adres, $miejscowosc, $kod_poczt, $kraj);
	}
	$date = date("Y-m-d H:i:s");
	insertIntoZamowienie($conn, $id_klienta, $_SESSION['total_price'], $date, $imie_nazwisko, $adres, $miejscowosc, $kod_poczt, $kraj);


	$id_zamowienia = getZamowienieId($conn, $id_klienta);

	foreach($_SESSION['cart'] as $ptid => $qty){
		$cena = getcenaprduktu($ptid);
		$query = "INSERT INTO zamowienia_produkty VALUES 
		('$id_zamowienia', '$ptid', '$cena', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert value false!" ;
			exit;
		}
	}

	session_unset();
?>
<div class="container" id="main">
	<p class="lead text-success">Transkacja przebiegła pomyślnie. Twój koszyk został wyczyszczony a zamówienie zostało przekazane do realizacji. 
	Aby kontynuować zakupy zaloguj się ponownie.</p>
</div>
<?php
	
	require_once "./footer.php";
?>