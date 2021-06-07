<?php
	function db_connect(){
		$conn = mysqli_connect("localhost", "root", "", "sklep");
		if(!$conn){
			echo "Nie można połączyć sie z bazą " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}

	function select4Latest($conn){
		$row = array();
		$query = "SELECT id_produktu, produkt_image FROM produkty ORDER BY id_produktu DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "błąd w pozyskiwaniu danych z bazy " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 4; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}

	function getProduktById($conn, $ptid){
		$query = "SELECT nazwa_produktu, producent, cena_produktu FROM produkty WHERE id_produktu = '$ptid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "błąd w pozyskiwaniu danych z bazy " . mysqli_error($conn);
			exit;
		}
		return $result;
	}

	function getZamowienieId($conn, $id_klienta){
		$query = "SELECT id_zamowienia FROM zamowienia WHERE id_klienta= '$id_klienta'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "błąd w pozyskiwaniu danych z bazy" . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['id_zamowienia'];
	}

	function insertIntoZamowienie($conn, $id_klienta, $total_price, $data, $z_imie_nazwisko, $z_adres, $z_miejscowosc, $z_kod_poczt, $z_kraj){
		$query = "INSERT INTO zamowienia VALUES 
		('', '" . $id_klienta . "', '" . $total_price . "', '" . $data . "', '" . $z_imie_nazwisko . "', '" . $z_adres . "', '" . $z_miejscowosc. "', '" . $z_kod_poczt . "', '" . $z_kraj . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Błąd w tworzeniu zamowienia " . mysqli_error($conn);
			exit;
		}
	}

	function getcenaprduktu($ptid){
		$conn = db_connect();
		$query = "SELECT cena_produktu FROM produkty WHERE id_produktu = '$ptid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Błąd w uzyskiwaniu ceny produktu " . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['cena_produktu'];
	}

	function getKlientId($imie_nazwisko, $adres, $miejscowosc, $kod_poczt, $kraj){
		$conn = db_connect();
		$query = "SELECT id_klienta from klienci WHERE 
		imie_nazwisko = '$imie_nazwisko' AND 
		adres= '$adres' AND 
		miejscowosc = '$miejscowosc' AND 
		kod_poczt = '$kod_poczt' AND 
		kraj = '$kraj'";
		$result = mysqli_query($conn, $query);
		
		if($result){
			$row = mysqli_fetch_assoc($result);
			return $row['id_klienta'];
		} else {
			return null;
		}
	}

	function setKlientId($imie_nazwisko, $adres, $miejscowosc, $kod_poczt, $kraj){
		$conn = db_connect();
		$query = "INSERT INTO klienci VALUES 
			('', '" . $imie_nazwisko . "', '" . $adres . "', '" . $miejscowosc . "', '" . $kod_poczt . "', '" . $kraj . "')";

		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "blad w trakcie dodawania klienta !" . mysqli_error($conn);
			exit;
		}
		$id_klienta = mysqli_insert_id($conn);
		return $id_klienta;
	}
	

	function getAll($conn){
		$query = "SELECT * from produkty ORDER BY id_produktu DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "błąd w pozyskiwaniu danych z bazy " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
?>