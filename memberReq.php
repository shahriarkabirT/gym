<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="memberreq.css">
</head>
<body>
<?php
include("database.php");
$sql = "SELECT * FROM registration";
$result = mysqli_query($conn, $sql);
$id = array();
$i = 0;
$noofrows = mysqli_num_rows($result);
if ($noofrows > 0) {
    echo "<div class='pack-container'>";
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<div class='pack'>";
        echo "<div>Id: " . $rows["id"] . "</div>";
        echo "<div>Fullname: " . $rows["fullname"] . "</div>";
        echo "<div>Username: " . $rows["username"] . "</div>";
        echo "<div>Email: " . $rows["email"] . "</div>";
        echo "<div>Pass: " . $rows["pass"] . "</div>";
        echo "<div>Contact: " . $rows["contact"] . "</div>";
        echo "<form action='memberReq.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $rows['id'] . "'>";
        echo "<input type='submit' name='submit$i' value='Delete'>";
        echo "</form>";

       
        echo "</div>";
        
        $id[$i] = $rows['id'];
        $i++;
    }
    echo "</div>";
}
mysqli_close($conn);
?>
</body>
</html>

<?php
include("database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id_to_delete = $_POST['id'];
    for ($j = 0; $j < $noofrows; $j++) {
        if (isset($_POST["submit$j"]) && $_POST["submit$j"] == "Delete") {
            $sql = "DELETE FROM registration WHERE id = $id_to_delete";
            mysqli_query($conn, $sql);
            // Add any further logic you need after deletion
            header ("Location:memberReq.php");
            break; // Exit the loop after the deletion
        }
    }
}
mysqli_close($conn);
?>
