<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>About  Us</h1>
    <ul>
        <li><a href="views\index.view.php">Home</a></li>
        <li><a href="views\about.view.php">About us</a></li>
        <li><a href="views\contact.view.php">Contact Us</a></li>
    </ul>

    <?php
        $greeting = "Hello ".htmlspecialchars($_GET['name']);
        echo "<p>{$greeting}</p>"
    ?>
</body>
</html>