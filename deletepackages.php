

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
$sql = "SELECT * FROM Packages";
$result = mysqli_query($conn, $sql);
$id = array();
$i = 0;
$noofrows = mysqli_num_rows($result);
if ($noofrows > 0) {
    echo "<div class='pack-container'>";
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<div class='pack'>";
        echo "<div>Id: " . $rows["PackageID"] . "</div>";
        echo "<div>Package Name: " . $rows["Name"] . "</div>";
        echo "<div>Price: " . $rows["Price"] . "</div>";
        echo "<div>Duration: " . $rows["DurationMonths"] . "</div>";
        echo "<div>Savings: " . $rows["Savings"] . "</div>";
        echo "<div> " . $rows["Description"] . "</div>";
        echo "<form action='deletepackages.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $rows['PackageID'] . "'>";
        echo "<input type='submit' name='submit$i' value='Delete'>";
        echo "</form>";

       
        echo "</div>";
        
        $id[$i] = $rows['id'];
        $i++;
    }
    echo "</div>";
}
mysqli_close($conn);
?><div class='pack-container'>
<div class="pack"><a href="createpackage.php">Create New</a></div></div>


</body>
</html>

<?php
include("database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id_to_delete = $_POST['id'];
    for ($j = 0; $j < $noofrows; $j++) {
        if (isset($_POST["submit$j"]) && $_POST["submit$j"] == "Delete") {
            $sql = "DELETE FROM Packages WHERE PackageID = $id_to_delete";
            mysqli_query($conn, $sql);
            // Add any further logic you need after deletion
            header ("Location:deletepackages.php");
            break; // Exit the loop after the deletion
        }
    }
}
mysqli_close($conn);
?>
