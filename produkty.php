
<?php
  session_start();
  $count = 0;
  
  require_once "./funkcje/database_functions.php";
  $conn = db_connect();

  $query = "SELECT id_produktu, produkt_image FROM produkty";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Nie mozna pozyskac danych " . mysqli_error($conn);
    exit;
  }

  $title = "Pełna lista produktów";
   require_once "./header.php";
?>
    <div class="container" id="main">
           
  <p class="lead text-center text-muted">Lista produktów: </p>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="produkt.php?id_produktu=<?php echo $query_row['id_produktu']; ?>">
              <img class="img-responsive img-thumbnail" src="./img/<?php echo $query_row['produkt_image']; ?>">
            </a>
          </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
	  
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./footer.php";
?>