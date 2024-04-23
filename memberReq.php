<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
</head>
<body>
    
</body>
</html>
<?php
    include("database.php");
    $sql = "SELECT * FROM registration";
    $result = mysqli_query($conn,$sql);
   
    if(mysqli_num_rows($result) > 0){
        echo "<div class='pack-container'>";
        while($rows = mysqli_fetch_assoc($result)){
            echo "<div class='pack'>";
            echo "<div>Id: " . $rows["id"] ."</div>";
            echo "<div>Fullname: " . $rows["fullname"] ."</div>";
            echo "<div>Username: " . $rows["username"] . "</div>";
            echo "<div>Email: " . $rows["email"] . "</div>";
            echo "<div>Pass: " . $rows["pass"] . "</div>";
            echo "<div>Contact: " . $rows["contact"] . "</div>";
            echo "</div>";


            
        };
        echo "</div>";
    }
    mysqli_close($conn);
?>