<?php
    require 'connection.php';
    session_start();
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Podano niepoprawny email";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $haslo=md5(md5(mysqli_real_escape_string($con,$_POST['haslo'])));
    if(strlen($haslo)<6){
        echo "Hasło powinno zawierać przynajmniej 6 znaków!";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $user_authentication_query="select id,email from users where email='$email' and haslo='$haslo'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        
        ?>
        <script>
            window.alert("Błędny email lub hasło!");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
       
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id']; 
        header('location: index.php');
    }
    
 ?>