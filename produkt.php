<?php
  session_start();
  $id_produktu = $_GET['id_produktu'];
  require_once "./funkcje/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM produkty WHERE id_produktu = '$id_produktu'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Nie mozna pozyskac danych z bazy " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "blad";
    exit;
  }

  $title = $row['nazwa_produktu'];
  require "./header.php";
?>
      
      <p class="lead" style="margin: 25px 0"><a href="books.php">Produkty</a> > <?php echo $row['nazwa_produktu']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./img/<?php echo $row['produkt_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Opis produktu</h4>
          <p><?php echo $row['opis_produktu']; ?></p>
          <h4>Informacje o produkcie:</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "opis_produktu" || $key == "produkt_image" || $key == "Producent" || $key == "nazwa_produktu"){
                continue;
              }
              switch($key){
               
                case "nazwa_produktu":
                  $key = "Nazwa";
                  break;
                case "producent":
                  $key = "Producent";
                  break;
                case "cena_produktu":
                  $key = "Cena";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="id_produktu" value="<?php echo $id_produktu;?>">
            <input type="submit" value="Dodaj do koszyka" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./footer.php";
?>