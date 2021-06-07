<?php
	session_start();

	$title = "Sprzedaj produkt";
	require "./header.php";
	require "./funkcje/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$id = trim($_POST['id']);
		$id= mysqli_real_escape_string($conn, $id);
		
		$nazwa = trim($_POST['nazwa']);
		$nazwa = mysqli_real_escape_string($conn, $nazwa);

		$producent = trim($_POST['producent']);
		$producent = mysqli_real_escape_string($conn, $producent);
		
		$opis = trim($_POST['opis']);
		$opis = mysqli_real_escape_string($conn, $opis);
		
		$cena = floatval(trim($_POST['cena']));
		$cena = mysqli_real_escape_string($conn, $cena);
		
		

		
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}



		$query = "INSERT INTO produkty VALUES ('". $id . "', '"  . $nazwa . "', '" . $producent . "', '" . $image . "', '" . $opis . "', '" . $cena .  "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Błąd przy wystawianiu produktu na sprzedaz " . mysqli_error($conn);
			exit;
		} else {
			header("Location: produkty.php");
		}
	}
?>

<div class="container" id="main">
	<form method="post" action="sprzedaz.php" enctype="multipart/form-data">
		<table class="table">
			
			<tr>
				<th>Nazwa</th>
				<td><input type="text" name="nazwa" required></td>
			</tr>
			<tr>
				<th>Producent</th>
				<td><input type="text" name="producent" required></td>
			</tr>
			<tr>
				<th>Zdjecie/okladka produktu(preferowane 200x300)</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Opis</th>
				<td><textarea name="opis" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Cena</th>
				<td><input type="text" name="cena" required></td>
			</tr>
			
		</table>
		<input type="submit" name="add" value="Sprzedaj!" class="btn btn-primary">
		<input type="reset" value="Anuluj" class="btn btn-default">
	</form>
	<br/>
	</div>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./footer.php";
?>