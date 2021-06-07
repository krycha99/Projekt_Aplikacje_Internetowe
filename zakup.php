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
		header("Location: dalej.php");
	} else {
		unset($_SESSION['err']);
	}


	$_SESSION['ship'] = array();
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$_SESSION['ship'][$key] = $value;
		}
	}
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
		<tr>
			<td>Cena dostawy</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>20.00</td>
		</tr>
		<tr>
			<th>Wliczając dostwe:</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "$" . ($_SESSION['total_price'] + 20); ?></th>
		</tr>
	</table>
	<form method="post" action="transakcja.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
		<p class="text-danger">Należy uzupełnić wszystkie pola</p>
		<?php } ?>
        <div class="form-group">
            <label for="card_type" class="col-lg-2 control-label">Typ</label>
            <div class="col-lg-10">
              	<select class="form-control" name="card_type">
                  	<option value="VISA">VISA</option>
                  	<option value="MasterCard">MasterCard</option>
                  	<option value="American Express">American Express</option>
              	</select>
            </div>
        </div>
        <div class="form-group">
            <label for="card_number" class="col-lg-2 control-label">Numer</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_number">
            </div>
        </div>
        <div class="form-group">
            <label for="card_PID" class="col-lg-2 control-label">PID</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_PID">
            </div>
        </div>
        <div class="form-group">
            <label for="card_expire" class="col-lg-2 control-label">Data ważności</label>
            <div class="col-lg-10">
              	<input type="date" name="card_expire" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="card_owner" class="col-lg-2 control-label">Imie i nazwisko</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_owner">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              	<button type="reset" href="cart.php" class="btn btn-default">Anuluj</button>
              	<button type="submit" class="btn btn-primary">KUP!</button>
            </div>
        </div>
    </form>
	<p class="lead">Kliknij przycisk KUP aby dokonać transakcji, lub kontynuuj zakupy.</p>
	</div>
<?php
	} else {
		echo "<p class=\"text-warning\">Twój koszyk jest pusty! Wróc do sklepu i dodaj coś do koszyka!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./footer.php";
	require "./mail.php";
?>