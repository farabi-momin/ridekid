<?php
    session_start();
    include("connection.php");

    $sql = "Select * from bike where availability = 'yes'";
    $result = mysqli_query($connection , $sql);

    if(isset($_COOKIE['model'])){
        $m = $_COOKIE['model'];
        $sql1 = "Select * from bike where model = '$m' and availability = 'yes'";
        $result = mysqli_query($connection , $sql1);
    }
?>

<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="sstyle.css">
    </head>
    <body>
        <header>
            
        </header>
        <div class="topnav topnav-b">
            <img class="logo-ridekid1" src="test/assets/images/ridekid_logo_white_011.png">
            <a href="index.php">Home</a>
            <a href="test.php#about">About</a>
            <a href="addbike.php">Motorcycle</a>
            <a href="#about">Blog</a>
        </div>
        <div class = "mainbody">
	        <h1>Available Bikes for Subscription</h1><hr>
	        <?php
                if($result->num_rows > 0){
                    while($bikelist = $result->fetch_assoc()){ ?>
                    <div class = "bike-dtl">
                        <img src=<?php echo 'images/'.$bikelist['model'];?> class = "bike-img">
                        <div class = "bike-info">
                            <h3><?php echo $bikelist['brand'].' '.$bikelist['model'] ?></h3>
                            <h4>Subscription Fee: BDT <?php echo $bikelist['fee'].' per month'; ?> </h4>
                            <form action = "requestB.php" method="POST">
                                <input type = "hidden" name = "bike_id", id = "bike_id" value = "<?php echo $bikelist['bikeid'] ?>">
                                <input class = "button" type= "submit" name = "submit" value ="Subscribe for a month">
                            </form>
                        </div>
                    </div>
                    <?php } 
                } else if($result->num_rows <= 0){
                    echo "<p>No Bikes available</p>";
                }
            ?>
        </div>
        <footer>
            <img class="logo-ridekid" src="test/assets/images/ridekid_logo_white_011.png">
			<p>Is a registered Bangladeshi company. Ridekid was incorporated at Dhaka Bangladesh to make motorcycle riding affordable and hassle-free.</p>
			<p>© 2024 - All rights reserved - Ridekid</p>
        </footer>
        
    </body>
</html>