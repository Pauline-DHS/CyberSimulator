<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html>
    <body>

        <?php
            // Set session variables
            if(isset($_POST['username'])){
                $_SESSION["username"] = $_POST['username'];
            }
            
            if(isset($_POST['password'])){
                $_SESSION["password"] = $_POST['password'];
            }
            // Print all the session vairables
            //print_r($_SESSION);

            if(($_SESSION["username"] == 'admin' )&&($_SESSION["password"] == 'admin')){
                include('CaptureTheFlag.php');
            }
            else{
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }
        ?>
        <?php
            // Remove all session variables
            session_unset();

            // Destroy the session 
            session_destroy();
        ?>
    </body>
</html>

