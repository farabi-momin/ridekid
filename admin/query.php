<?php
    include("../connection.php");
    include("../date.php");

    $bikeid = $_GET['q'];
    $date = date("y-m-d");
    $date2 = date("y-m-d", strtotime("+7 day"));

    $sql = "update bike set status = 'subscribed', start_date = '$date', end_date = '$date2' where bikeid = '$bikeid'";
    $result = mysqli_query($connection, $sql);

    $sql = "update subscribe_status set status='yes' where bikeid='$bikeid'";
    $result = mysqli_query($connection,$sql1);
?>