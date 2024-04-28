

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Requests</title>
    <link rel="stylesheet" href="memberreq.css">
</head>
<style>
    .pack a{
        text-decoration: none;
        color: black;
    }
</style>
<body>

<?php
include("navbar.html");
include("database.php");
$sql = "SELECT * FROM registration";
$result = mysqli_query($conn, $sql);

$noofrows = mysqli_num_rows($result);
if ($noofrows > 0) {
    echo "<div class='pack-container'>";
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<div class='pack'>";


        echo "<div>Id: " . $rows["id"] . "</div>";
        echo "<div>Full name: " . $rows["fullname"] . "</div>";
        echo "<div>Username: " . $rows["username"] . "</div>";
        echo "<div>Email: " . $rows["email"] . "</div>";
        echo "<div> Password: " . $rows["pass"] . "</div>";
        echo "<div> Contact: " . $rows["contact"] . "</div>";

        echo "<form action='memberReq.php' method='post'>";

        echo "<input type='hidden' name='contact' value='" . $rows['contact'] . "'>";
        echo "<input type='hidden' name='pass' value='" . $rows['pass'] . "'>";
        echo "<input type='hidden' name='email' value='" . $rows['email'] . "'>";
        echo "<input type='hidden' name='username' value='" . $rows['username'] . "'>";
        echo "<input type='hidden' name='fullname' value='" . $rows['fullname'] . "'>";
        echo "<input type='hidden' name='id' value='" . $rows['id'] . "'>";
        echo "<input type='submit' name='admit' value='Admit' style='margin-right: 10px;'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";

       
        echo "</div>";
        
     

    }
    echo "</div>";
}

?>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_to_insert = $_POST['id'];
    $fullname_to_insert = $_POST['fullname'];
    $username_to_insert = $_POST['username'];
    $email_to_insert = $_POST['email'];
    $pass_to_insert= $_POST['pass'];
    $contact_to_insert = $_POST['contact'];
    
    if($_POST["admit"] == "Admit"){
        $sql = "INSERT INTO members(fullname,phone,username,pass) 
            
        VALUES('$fullname_to_insert','$contact_to_insert','$username_to_insert','$pass_to_insert'); ";
        mysqli_query($conn, $sql);  
        
        $sql = "DELETE FROM registration where id = $id_to_insert"; 
        mysqli_query($conn, $sql); 
        header("Location:memberReq.php");
     }
     else if($_POST["delete"] == "Delete"){
        $sql = "DELETE FROM registration WHERE id = $id_to_insert";
        mysqli_query($conn, $sql);
        header ("Location:memberReq.php");
                
     }
    }

    
mysqli_close($conn);
?>
