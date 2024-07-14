<?php
    session_start();
    include("connection.php");

    $userid = $_SESSION['id'];
    if(!empty($_SESSION['id'])){
        $sql = "select * from bike where userid = '$userid'";
        $result = mysqli_query($connection, $sql);
    }else{
        header("location:login.html");
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
        <div class="mainbody">
            <h1 style="color:green;"><?php echo 'Welcome ' .$_SESSION['name']; ?></h1>
            <a href = "addbike.php"><button class = "button floatR"> Add a bike </button></a>
                <div class = "history">
                    <h4>Your History</h4><hr>
                        <?php
                            if($result->num_rows >0){
                                while($history=$result->fetch_assoc()){
                                    echo "<p>You have requseted for ".$history['brand']. " ".$history['model']. " which is ".$history['status'].".</p><br>";
                                }
                            } else { echo 'No bikes is Subscribe!';}
                        ?>
                </div>
        </div>
        <div style="padding-bottom:100px;padding-right:25px"> <a href = "logout.php"><button class="button floatR">Log Out</button></a></div>
        <footer>
            <img class="logo-ridekid" src="test/assets/images/ridekid_logo_white_011.png">
			<p>Is a registered Bangladeshi company. Ridekid was incorporated at Dhaka Bangladesh to make motorcycle riding affordable and hassle-free.</p>
			<p>© 2024 - All rights reserved - Ridekid</p>
        </footer>
    </body>
</html>