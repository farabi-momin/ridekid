<?php
    session_start();
    include("../connection.php");

    $userid = $_SESSION['id'];
    $sql = "select * from bike where status = 'pending'"; 
    $result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="../sstyle.css">
    </head>
    <body>
        <div class="header"><h3>RideKid</h3></div>
        <div class="mainbody">
        <h1>Welcome to Admin Panel</h1>
        <div class = "button"><a href = "addbike.html"> Add a bike </a>  </div>
        <div class = "button"><a href = "sub.php">Bike Info</a>  </div>
        <div class = "history">
            <h4>Your History</h4><hr>
            <?php
                if($result->num_rows >0){
                    while($history=$result->fetch_assoc()){
                        $userid = $history['userid'];
                        $sql1 = "select username from user where userid = '$userid'";
                        $result1 = mysqli_query($connection, $sql1);
                        $row = mysqli_fetch_row($result1);
                        echo "<label>".$row[0]." have requseted for ".$history['brand']. " ".$history['model']. " which is ".$history['status'].".</label>";?>
                        <form action = "request.php">
                            <input type = "hidden" name = "userid" value = "<?php echo $userid; ?>">
                            <input type = "hidden" name = "bikeid" value = "<?php echo $history['bikeid']; ?>">
                            <input type = "submit" name = "submit" value = "Chech Detail">
                        </form><br>
                    <?php }
                }
            ?>
        </div>
        </div>
        <div class="footer">Footer</div>
    </body>
</html>