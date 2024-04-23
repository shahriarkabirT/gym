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
<body>
<h1><center>Create Package</center></h1>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<label>Package name: </label><br>
<input type="text" name="packname" ><br>
<label>Price: </label><br>
<input type="text" name="price" ><br>
<label>Duration(Month):</label> <br>
<input type="text" name="duration" ><br>
<label>Savings: </label><br>
<input type="text" name="savings" ><br>
<label>Description: </label><br>
<input type="text" name="description" ><br><br>
<input type="submit" name="login" value="submit">
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
