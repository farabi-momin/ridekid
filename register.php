<?php
    include("connection.php");
    include("date.php");
    session_start();

    if(isset($_POST['submit'])){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_pass = $_POST['password'];
        $user_id = rand();

        $sql = "insert into user(userid, username, email, password) value($user_id, '$user_name', '$user_email', '$user_pass')";
        $result = mysqli_query($connection , $sql);

        if($result){
            header("Location:login.html");
        } else {
            echo '<script> window.location.href = "register.html"; 
                    alert("Failed to create account") </script>';
        }
    }
?>