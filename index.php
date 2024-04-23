<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regan Fitness Studio</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Seymour+One&display=swap" rel="stylesheet">
</head>
   

<body>


    <div class="top-container">

    <!-- first portion  -->
       <div class="navbar">
       <?php include 'navbar.html';?>
       </div>

       <div class="join">
            <a href="join.php">Enroll Now</a>
       </div>
    </div>
    <div class="second-container">
        <div class="packages">
            
            <?php 
        include("showPackages.php");
        ?></div>
        
    </div>
    
<script src="script.js"></script>
</body>
</html>

<?php



?>