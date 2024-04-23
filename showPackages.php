<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showPackages</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .pack-container {
            
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Adjust as needed */
        }
        .pack {
            margin-top:30px;
            width: calc(33.33% - 20px); /* Adjust width as needed */
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            background-color:rgb(61, 107, 135,0.8) ;
            
            
            
            
        }
        .pack div{
            /* background-color: red; */
            margin-bottom: 10px;
            border-bottom: 1px solid black;
        }
    </style>
</head>
<body>
<?php
    include("database.php");
    $sql = "SELECT * FROM Packages";
    $result = mysqli_query($conn,$sql);
   
    if(mysqli_num_rows($result) > 0){
        echo "<div class='pack-container'>";
        while($rows = mysqli_fetch_assoc($result)){
            echo "<div class='pack'>";
            echo "<div>" . $rows["Name"] ."</div>";
            echo "<div>" . $rows["DurationMonths"] . "</div>";
            echo "<div>" . $rows["Price"] . "</div>";
            echo "<div>" . $rows["Description"] . "</div>";
            echo "<div>" . $rows["Savings"] . "</div>";
            echo "</div>";
        };
        echo "</div>";
    }
    mysqli_close($conn);
?>
</body>
</html>
