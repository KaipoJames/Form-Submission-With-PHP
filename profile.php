<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <?php
    include("header.php");
    //include("functions.php");
    include("ch_title.php");

    $db = connect_to_DB();

    $sql_query = "SELECT * FROM users WHERE id='" . $_GET["id"] . "'";
    $memberResult = mysqli_query($db, $sql_query);
    if (!$memberResult) {
        echo "MYSQLI Error: " . mysqli_error($db);
        exit();
    }
    if (mysqli_num_rows($memberResult) != 1) {
        echo "User Not Found</br>";
        echo mysqli_num_rows($memberResult);
        exit();
    }
    $member = mysqli_fetch_assoc($memberResult);
    ?>
    <div class="user-info">
        ID: <?php echo $member["id"]; ?></br>
        NAME: <?php echo $member["name"]; ?></br>
        EMAIL: <?php echo $member["email"]; ?></br>
        PASSWORD: <?php echo $member["password"]; ?></br>
    </div>

    <?php
    $title = $member["name"];
    modify_title($title);

    include("footer.php");
    ?>
</body>

</html>