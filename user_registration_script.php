<?php
    require 'connection.php';
    session_start();
    $name= mysqli_real_escape_string($con,$_POST['nazwa']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Podany email jest niepoprawny. Zaraz wrócisz do strony rejestracji...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $haslo=md5(md5(mysqli_real_escape_string($con,$_POST['haslo'])));
    if(strlen($haslo)<6){
        echo "Hasło powinno zawierać przynajmniej 6 znaków. Zaraz wrócisz do strony rejestracji...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $kontakt=$_POST['kontakt'];
    $miasto=mysqli_real_escape_string($con,$_POST['miasto']);
    $adres_u=mysqli_real_escape_string($con,$_POST['adres_u']);
    $duplicate_user_query="select id from users where email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);
    if($rows_fetched>0){
       
        ?>
        <script>
            window.alert("Podany email posiada juz utworzone konto!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }else{
        $user_registration_query="insert into users(nazwa,email,haslo,kontakt,miasto,adres_u) values ('$name','$email','$haslo','$kontakt','$miasto','$adres_u')";
        
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        echo "Pomyślnie zarejestrowano konto!";
        $_SESSION['email']=$email;
        
        $_SESSION['id']=mysqli_insert_id($con); 
      
        ?>
        <meta http-equiv="refresh" content="3;url=index.php" />
        <?php
    }
    
?>