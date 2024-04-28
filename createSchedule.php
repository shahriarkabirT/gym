<link rel="stylesheet" href="styles.css">
<div class="top-container">
<style>
.text1 {
    color: white;
    font-size: 40px;
    text-align: center;
    margin-top: 50px;
}

.text2 {  
    color: white;
    font-size: 24px;
    text-align: center;
}

.schedule-form {
    text-align: center;
    margin-top: 30px;
    color: white;
}

.schedule-form input[type="date"],
.schedule-form input[type="time"],
.schedule-form input[type="text"],
.schedule-form input[type="submit"] {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
}

.schedule-form input[type="submit"] {
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.schedule-form input[type="submit"]:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

.delete-button {
    text-align: center;
}

.delete-button input[type="submit"] {
    background-color: #ff4444;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.delete-button input[type="submit"]:hover {
    background-color: #cc0000;
}

</style>

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



<div class="schedule-form">
    <form method="post" action="createSchedule.php">
        <p class="text2">Select Date and Time</p>
        <input type="date" id="selectedDate" name="selectedDate"><br><br>
        <input type="time" id="selectedTime" name="selectedTime"><br><br>
        <p>Your username:</p> 
        <input type="text" id="trainer_username" name="trainer_username"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectedDate"])) {
    if (!empty($_POST["selectedTime"] && !empty($_POST["selectedDate"]))) {
        $selectedDate = $_POST["selectedDate"];
        $selectedTime = $_POST["selectedTime"];
        $trainer_username = $_POST["trainer_username"];
        $sql = "INSERT INTO schedule(date,time,trainer_username) values('$selectedDate','$selectedTime','$trainer_username')";
        mysqli_query($conn,$sql); 
        echo "<p style='color:white'>Selected date: " . $selectedDate ."</p>";
        echo "<p style='color:white'>Schedule has been added.</p>";
    } else {
        echo "Please select date and time both.";
    } 
}
?>
</div>
<div class="second-container">
<?php
include("showSchedule.php")?>
<br>

<form action="createSchedule.php" method="post">
    <div class="delete-button">
        <input type="submit" name="delete" value="Delete older schedule">
    </div>
</form>
<?php
if (isset($_POST["delete"])) {
    $sql = "DELETE FROM schedule WHERE id = (SELECT MIN(id) FROM schedule)";
    mysqli_query($conn,$sql);
    header("Location: createSchedule.php");
}

mysqli_close($conn);
?>

</div>

