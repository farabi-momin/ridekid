<?php
    session_start();
    include("../connection.php");

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "select * from admin where email = '$email' and password = '$password'";
        $result = mysqli_query($connection , $sql);
        $arr = $result->fetch_array(MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $_SESSION['id'] = $arr["id"];
        $_SESSION['email'] = $arr["email"];

        if($count == 1){
            header("Location:index.php");
        } else {
            echo '<script> window.location.href = "login.html"; 
                    alert("Invalid email or password") </script>';        
        }
    }
?> 