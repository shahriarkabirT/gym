<?php include("database.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <?php include("navbar.html") ?>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 300px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="password"],
    select {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        background-color: rgb(135, 146, 163);
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: rgb(135, 146, 160);
    }
    .right a {
    color:black;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
  }
</style>
<body>
  <!-- <div class="loginbar">
<div><a href="admin.php">Admin Pannel</a></div>
<div><a href="trainer.php">Trainer's login</a></div>
<div><a href="member.php">Member's login</a></div>

</div> -->
<br>
<div class="container">
        <h2>Login Form</h2>
        <form action="login.php" method="post">
            <label for="login_chose">User Type</label><br>
            <select name="login_chose">
                <option value="admins">Admin</option>
                <option value="trainers">Trainer</option>
                <option value="members">Member</option>
            </select><br><br>
            <label for="username">Username</label><br>
            <input type="text" name="username" required><br>
            <label for="password">Password</label><br>
            <input type="password" name="pass" required><br><br>
            <input type="submit"  value="Submit">
        </form>
    </div>


</body>
</html>
    
    
<?php 

     if($_SERVER["REQUEST_METHOD"] == "POST"){

        $tablename = $_POST["login_chose"];
        $username_input = $_POST["username"];
        $pass_input = $_POST["pass"];
        $sql = "SELECT username,pass FROM $tablename";
        $result = mysqli_query($conn,$sql);
        
        $username_data = array();
        $password_data = array();
        $i = 0;
        $no_of_rows = $result->num_rows;
        while ($row = $result->fetch_assoc()) {
            $username_data[$i]=  "$row[username]";
            $password_data[$i] = "$row[pass]";
            $i++;
        }
        
        for($j = 0 ; $j < $no_of_rows; $j++){
            if($username_input == $username_data[$j] && $pass_input == $password_data[$j]){
                $username_database = $username_data[$j];
                $password_database = $password_data[$j];
                break;
            }
        }
      

        if($_POST["login_chose"] == "admins"){  
            if($username_input == $username_database && $pass_input == $password_database){
                header("Location: admin.php");
            }
            else{
                echo "<p align = 'center'>Invalid Username or password</p>";
            }   
        }
        if($_POST["login_chose"] == "members"){
            if($username_input == $username_database && $pass_input == $password_database){
                header("Location: member.php");
            }
            else{
                echo "<p align = 'center'>Invalid Username or password</p>";
            }   
        } 
        if($_POST["login_chose"] == "trainers"){
           if($username_input == $username_database && $pass_input == $password_database){
                header("Location: createSchedule.php");
            }
            else{
                echo "<p align = 'center'>Invalid Username or password</p>";
            }   
        }
         
        
     }
    
?>