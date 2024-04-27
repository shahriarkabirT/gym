<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showPackages</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Seymour+One&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Seymour One', sans-serif;
            background-color: rgb(128, 140, 139);
            padding: 0;
            box-sizing: border-box;
        }
        .pack-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .pack {
            width: calc(33.33% - 40px); 
            border: 2px solid #007bff; /* Blue border */
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            transition: transform 0.3s ease-in-out;
        }
        .pack:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .pack div {
            margin-bottom: 10px;
        }
        .pack h2 {
            color: #007bff; /* Blue heading */
            margin-bottom: 10px;
        }
        .pack p {
            color: #555555;
        }
        .join {
            text-align: center;
            margin-top: 30px;
        }
        .join input[type='submit'] {
            background-color: #007bff; /* Blue button */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .join input[type='submit']:hover {
            background-color: #0056b3; /* Darker blue on hover */
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
            echo "<h2>" . $rows["Name"] ."</h2>";
            echo "<div><strong>Package ID:</strong> " . $rows["PackageID"] ."</div>";
            echo "<div><strong>Duration:</strong> " . $rows["DurationMonths"] . " months</div>";
            echo "<div><strong>Price:</strong> $" . $rows["Price"] . "</div>";
            echo "<div><strong>Description:</strong> " . $rows["Description"] . "</div>";
            echo "<div><strong>Savings:</strong> " . $rows["Savings"] . "</div>";
            echo "</div>";
            
        };
        echo "</div>";

        echo "<div class='join'><form action='join.php'><input type='submit' name ='join' value ='Join Us'></form></div>";
    }
    mysqli_close($conn);
?>
</body>
</html>
