<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms-Header</title>
</head>

<body>
    <header>
        <h1>Register For Our Blog!</h1>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="./users.php">Members</a></li>
            <li><a href="./register.php">Register</a></li>
        </ul>
    </header>
</body>

<?php
function connect_to_DB()
{
    $db = mysqli_connect("localhost", "kaipojam_blog_user", "Q{^0T9Et40!g", "kaipojam_blog");
    return $db;
}
?>

</html>