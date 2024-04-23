<link rel="stylesheet" href="styles.css">
<div class="top-container">
<style>
.text1{
    color: white;
    font-size: 40px;
}
.text2{
    color:white;
    
}

</style>
<center>
<?php
    include("database.php");
    include("navbar.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    
</head>
<body>
<p class="text1">Make a schedule</p>

<?php
include("showSchedule.php")?>
<br>


<form action="createSchedule.php" method="post"><input type="submit" name="delete" value="Delete older schedule"><br><br>
</form>


<form method="post" action="createSchedule.php">
    
        <p class="text2">Select Date and Time</p>
    <input type="date" id="selectedDate" name="selectedDate"><br><br>
    <input type="time" id="selectedTime" name="selectedTime"><br><br>

    <input action="createSchedule.php" type="submit" name = "submit" value="Submit">

</form>






</body>
</html>

<?php
      
    if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectedDate"])) {
        if(!empty($_POST["selectedTime"] && !empty($_POST["selectedDate"]))){
        $selectedDate = $_POST["selectedDate"];
        $selectedTime = $_POST["selectedTime"];
        $sql = "INSERT INTO schedule(date,time)
                            values('$selectedDate','$selectedTime')";
        mysqli_query($conn,$sql); 
        echo "Selected date: " . $selectedDate;
                           
        header("Location: createSchedule.php");
    }
    else{
        echo "Please select date and time both.";
    } 
}
    if(isset($_POST["delete"])){
        $sql = "DELETE FROM schedule
        WHERE id = (
            SELECT MIN(id)
            FROM schedule
        ); ";
        mysqli_query($conn,$sql);
        header("Location: createSchedule.php");
    }

   mysqli_close($conn);
?>
</center>

</div>