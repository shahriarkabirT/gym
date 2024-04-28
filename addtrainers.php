<?php
    include("database.php");
    include("navbar.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trainer Information</title>
</head>
<body>
    <div class="container">
        <h2>Add Trainer Information</h2>
        <form action="addtrainers.php" method="POST">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" required>
            </div>
            <button type="submit">ADD</button>
        </form>
    </div>
</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $fullName = $_POST["fullName"];
    $contact = $_POST["contact"];
    $position = $_POST["position"];
    // Here, you can perform validation and database insertion

 

    $sql = "SELECT * FROM trainers WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if username already exists
    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different one.";
    }
    else{
        $sql = "INSERT INTO trainers(fullname,username,trainer_address,pass,phone,position)
                        values('$fullName','$username','$address','$password','$contact','$position'
            
        ); ";
        mysqli_query($conn,$sql);
        
        mysqli_close($conn);
    //   header("Location: .html");
    }

    
      //  
    // Note: Never echo passwords in a real-world scenario
}
?>
