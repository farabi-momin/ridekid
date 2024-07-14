<?php
    include 'connection.php';
    $sql = "Select * from bike where availability = 'yes'";
    $result = mysqli_query($connection , $sql);

    $bikelist = array();

    while($r = $result->fetch_assoc()){
        $bikelist[]=$r;
    }
    
?>
<script>
    var bikelist = <?php echo '["' . implode('", "', $bikelist) . '"]' ?>;
    document.write(bikelist);
</script>