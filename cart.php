<?php
	
	session_start();
	require_once "./funkcje/database_functions.php";
	require_once "./funkcje/cart_functions.php";

	if(isset($_POST['id_produktu'])){
		$id_produktu = $_POST['id_produktu'];
	}

	if(isset($id_produktu)){
	
		if(!isset($_SESSION['cart'])){
			
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$id_produktu])){
			$_SESSION['cart'][$id_produktu] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$id_produktu]++;
			unset($_POST);
		}
	}

	
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $ptid =>$qty){
			if($_POST[$ptid] == '0'){
				unset($_SESSION['cart']["$ptid"]);
			} else {
				$_SESSION['cart']["$ptid"] = $_POST["$ptid"];
			}
		}
	}

	
	$title = "Twój koszyk";
	require "./header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
<div class="container" id="main">
   	<form action="cart.php" method="post">
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
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $ptid; ?>"></td>
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
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Zapisz zmiany">
	</form>
	<br/><br/>
	<a href="dalej.php" class="btn btn-primary">Kup!</a> 
	<a href="produkty.php" class="btn btn-primary">Kontynuuj zakupy</a>
	</div>
<?php
	} else {
		echo "<p  class=\"text-warning\" >Twój koszyk jest pusty! Wróc do sklepu i dodaj coś do koszyka!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./footer.php";
?>