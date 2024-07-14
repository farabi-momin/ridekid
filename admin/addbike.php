<?php
    include('../connection.php');
    session_start();

    if(isset($_POST['submit'])){
        $bid = rand();
        $bname = $_POST['bname'];
        $model = $_POST['model'];
        $chasisNo = $_POST['chasisNo'];
        $fee = $_POST['fee'];
        $path = 'images/'.$model;

        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $dir = '../images/'.$model;
 
        move_uploaded_file($file_tmp,$dir); 

        $sql = "insert into bike (bikeid, brand, model, chasisNo, availability, fee, picture) values('$bid', '$bname', '$model', '$chasisNo', 'yes', '$fee', '$path')";
        $result = mysqli_query($connection,$sql);

        header("location:index.php");
    } else {
        echo 'Something Went Wrong!';
    }
?>