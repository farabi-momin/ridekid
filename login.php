<?php
    session_start();
    include ('connection.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];


        $sql = "select * from user where email = '$email' and password = '$password'";
        $result = mysqli_query($connection , $sql);
        $arr = $result->fetch_array(MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $_SESSION['name'] = $arr["username"];
        $_SESSION['id'] = $arr["userid"];
        $_SESSION['email'] = $arr["email"];
        echo $_SESSION['name'];

        if($count == 1){
            header("Location:index.php");
        } else {
            echo '<script> window.location.href = "login.html"; 
                    alert("Invalid email or password") </script>';       
        }
    }
?>