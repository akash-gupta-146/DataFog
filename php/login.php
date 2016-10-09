<?php
include ("functions.php");
if(isset($_POST['email'])){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email_id = $_POST['email'];
        $password = $_POST['password'];
        $select_query = "SELECT * FROM user WHERE email_id='$email_id' AND password='$password'";
        $select = mysqli_query($con,$select_query);
        if($select) {
            $select_num_row = mysqli_num_rows($select);
            if($select_num_row==0){
               // echo "<script> window.location='register.php' </script>";
                echo "wrong email-id or password <br>Dont have an account? <a href='register.php'>Register Now!</a>";
            }
            else{
                $user_data = mysqli_fetch_row($select);
                session_start();
                $_SESSION['user_id']=$user_data[0];
                $_SESSION['user_fname']=$user_data[1];
                $_SESSION['user_lname']=$user_data[2];
                $_SESSION['email_id']=$user_data[3];
                $_SESSION['phone_no']=$user_data[4];
                $_SESSION['username']=$user_data[5];
                $_SESSION['password']=$user_data[6];
                echo " <script> window.location='login.php' </script>";
            }
        }

    }
}

?>