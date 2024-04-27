<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            margin-top: 10%;
            text-align: center;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            transition: all 0.3s ease;
            margin: 10px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="top-container">
    <div class="container">
        <a href="createpackage.php">Create Packages</a><br>
        <a href="deletepackages.php">Delete Packages</a><br>
        <a href="memberReq.php">Member Request</a><br>
        <a href="admitMembers.php"> Admit Members</a><br>
    </div>
</div>
</body>
</html>
