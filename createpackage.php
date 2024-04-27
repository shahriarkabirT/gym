<center>
<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating Packages</title>
    
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        form {
            width: 300px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<body>
<h1><center>Create Package</center></h1>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="packname">Package name:</label><br>
    <input type="text"  name="packname"><br>
    <label for="price">Price:</label><br>
    <input type="text" name="price"><br>
    <label for="duration">Duration (Month):</label><br>
    <input type="text"  name="duration"><br>
    <label for="savings">Savings:</label><br>
    <input type="text"  name="savings"><br>
    <label for="description">Description:</label><br>
    <input type="text"  name="description"><br><br>
    <input type="submit"  name="login">
</form>





</body>
</html>

<?php
      
    if(isset($_POST["login"])){
        $packname = filter_input(INPUT_POST,"packname",FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST,"price",FILTER_SANITIZE_SPECIAL_CHARS);
        $duration = filter_input(INPUT_POST,"duration",FILTER_SANITIZE_SPECIAL_CHARS);
        $savings = filter_input(INPUT_POST,"savings",FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS);
       
        if(empty($packname) or  empty($price) or empty($duration) or empty($savings)){
            echo "Fill all the box";
        }
        else{
            $sql = "INSERT INTO Packages(name,description,price,durationMonths,savings)
                            values('$packname','$description','$price','$duration','$savings')";
            mysqli_query($conn,$sql);
            echo "package input successful";
        }
        
    }
    
   mysqli_close($conn);
?>
</center>
