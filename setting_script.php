<?php
    session_start();
    require 'connection.php';
     
    $old_password= md5(md5(mysqli_real_escape_string($con,$_POST['oldPassword'])));
    $new_password= md5(md5(mysqli_real_escape_string($con,$_POST['newPassword'])));
    $email=$_SESSION['email'];
  
    $password_from_database_query="select haslo from users where email='$email'";
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);
    
    if($row['haslo']==$old_password){
        $update_password_query="update users set haslo='$new_password' where email='$email'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        echo "Twoje hasło zostało zmienione.";
        ?>
        <meta http-equiv="refresh" content="3;url=index.php" />
        <?php
    }else{
        ?>
        <script>
            window.alert("Podane hasło jest błędne!!");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
        
    }
?>