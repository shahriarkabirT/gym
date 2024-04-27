

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Packages</title>
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
$id1 = array();
$id2 = array();
$id3 = array();
$id4 = array();
$id5 = array();
$id6 = array();
$i = 0;
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

        echo "<form action='admitMembers.php' method='post'>";

        echo "<input type='hidden' name='contact' value='" . $rows['contact'] . "'>";
        echo "<input type='hidden' name='pass' value='" . $rows['pass'] . "'>";
        echo "<input type='hidden' name='email' value='" . $rows['email'] . "'>";
        echo "<input type='hidden' name='username' value='" . $rows['username'] . "'>";
        echo "<input type='hidden' name='fullname' value='" . $rows['fullname'] . "'>";
        echo "<input type='hidden' name='id' value='" . $rows['id'] . "'>";
        echo "<input type='submit' name='submit$i' value='Admit'>";
        echo "</form>";

       
        echo "</div>";
        
        $id1[$i] = $rows['id'];   
        $id2[$i] = $rows['fullname'];
        $id3[$i] = $rows['username'];
        $id4[$i] = $rows['email'];
        $id5[$i] = $rows['pass'];
        $id6[$i] = $rows['contact'];

        $i++;

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

    echo $fullname_to_insert ;
    echo $username_to_insert ;
    echo $pass_to_insert ;
    echo $id_to_insert;
    echo $email_to_insert;
    echo $contact_to_insert;

    $sql = "INSERT INTO members(fullname,phone,username,pass) 
            
   VALUES('$fullname_to_insert','$contact_to_insert','$username_to_insert','$pass_to_insert'); ";
   mysqli_query($conn, $sql);  
   
   $sql = "DELETE FROM registration where id = $id_to_insert"; 
   mysqli_query($conn, $sql); 
   header("Location:memberinsertion.html");
}
mysqli_close($conn);
?>
