<?php
	
	session_start();
	require_once "./funkcje/database_functions.php";
	$title = "Twój koszyk";
	require "./header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
<div class="container" id="main">
	<table class="table">
		<tr>
			<th>Produkt</th>
	   		<th>Cena</th>
	  		<th>Ilość</th>
	   		<th>Suma</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $ptid => $qty){
					$conn = db_connect();
					$produkt = mysqli_fetch_assoc(getProduktById($conn, $ptid));
			?>
		<tr>
			<td><?php echo $produkt['nazwa_produktu'] . " by " . $produkt['producent']; ?></td>
			<td><?php echo "$" . $produkt['cena_produktu']; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "$" . $qty * $produkt['cena_produktu']; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		</tr>
	</table>
	<form method="post" action="zakup.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">Należy uzupełnić wszystkie pola</p>
			<?php } ?>
		<div class="form-group">
			<label for="imie_nazwisko" class="control-label col-md-4">Imie i nazwisko</label>
			<div class="col-md-4">
				<input type="text" name="imie_nazwisko" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="adres" class="control-label col-md-4">Adres</label>
			<div class="col-md-4">
				<input type="text" name="adres" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="miejscowosc" class="control-label col-md-4">Miejscowosc</label>
			<div class="col-md-4">
				<input type="text" name="miejscowosc" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="kod_poczt" class="control-label col-md-4">Kod pocztowy</label>
			<div class="col-md-4">
				<input type="text" name="kod_poczt" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="kraj" class="control-label col-md-4">Kraj</label>
			<div class="col-md-4">
				<input type="text" name="kraj" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Dalej" class="btn btn-primary">
		</div>
	</form>
	<p class="lead">Kliknij przycisk Dalej aby dokonać transakcji, lub kontynuuj zakupy.</p>
	</div>
<?php
	} else {
		echo "<p class=\"text-warning\">Twój koszyk jest pusty! Wróc do sklepu i dodaj coś do koszyka!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./footer.php";
?>