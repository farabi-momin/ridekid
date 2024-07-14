<?php
    session_start();
    include("../connection.php");
    include("../date.php");

    if(isset($_GET['submit'])){
        $userid = $_GET['userid'];
        $bikeid = $_GET['bikeid'];

        $sql = "SELECT * FROM bike natural join user WHERE bike.userid = user.userid and bikeid = '$bikeid'";
        $result = mysqli_query($connection, $sql);
        $row = $result->fetch_assoc();
    }
?>
<!DOCTYPE html>
    <head>
    <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div>
            <h4>User Info</h4>
            Name: <?php echo $row['username'] ?><br>
            Email: <?php echo $row['email'] ?><br>
        </div>
        <div>
            <h4>Bike Info</h4>
            Brand: <?php echo $row['brand'] ?><br>
            Model: <?php echo $row['model'] ?><br>
            Chasis No: <?php echo $row['chasisNo'] ?><br>
            <button value = "<?php echo $bikeid?>" name = "grant" id = "grant" onclick = "query()"> Grant Subscription </button>
        </div>

        <script>
            function query(){
                var id = document.getElementById("grant").value;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("grant").disabled = true;
                        }
                    };
                xmlhttp.open("GET","query.php?q="+id,true);
                xmlhttp.send();
                location.href = "index.php";
            }
        </script>
    </body>
</html>    