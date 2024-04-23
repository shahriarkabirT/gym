<center><style>
    .schedulediv{
        color:white;
        font-size: 30px;
        font-weight: 10000;
    }
    .dateTime{
        color:white;
    }
</style>
<?php
echo "<div class ='schedulediv'> Scheduled date: </div><br>";

$sql = "SELECT * FROM schedule";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    // echo "<div class='pack-container'>";
    while($rows = mysqli_fetch_assoc($result)){
        echo "<div class='dateTime'>";
        echo "Date:  " . $rows["date"] ."\t<br>";
        echo "Time:" . $rows["time"] ."\t <br><br>";
        
    };
    echo "</div>";
}

?>

</center>