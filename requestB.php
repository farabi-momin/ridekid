<?php
    include 'connection.php';
    include 'date.php';
    session_start();

    if(isset($_POST['submit'])){
        $bikeid = $_POST['bike_id'];
        $userid = $_SESSION['id'];
        $sub_id = rand();
        

        $sql = "update bike set userid = '$userid', status = 'pending', availability = 'No' where bikeid = '$bikeid'";
        $result = mysqli_query($connection, $sql);
    }
?>