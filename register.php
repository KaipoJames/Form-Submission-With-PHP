<?php
// Database blog_user password: Q{^0T9Et40!g
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casual Blog</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <?php
    include("header.php");

    $db = connect_to_DB();

    $valid_post = true;
    $error_msg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["password"] != $_POST["confirm-password"]) {
            $valid_post = false;
            $error_msg .= "Passwords Do Not Match</br>";
            $password_match_error = true;
        }
        if (strlen($_POST["name"]) < 5) {
            $valid_post = false;
            $error_msg .= "Name is too short</br>";
            $name_length_error = true;
        }
        if (strlen($_POST["name"]) > 200) {
            $valid_post = false;
            $error_msg .= "Name is too long</br>";
            $name_length_error = true;
        }
        if (strlen($_POST["email"]) > 200) {
            $valid_post = false;
            $error_msg .= "Email is too long</br>";
            $email_error = true;
        }

        if ($valid_post) {
            $hashed_password = sha1($_POST['password']);
            $sql_query = "INSERT INTO users (name,email,hashed_password) VALUES (";
            $sql_query .= "'" . $_POST['name'] . "','" . $_POST['email'] . "','$hashed_password');";
            //echo "</br>" . $sql_query;
            $result = mysqli_query($db, $sql_query);
            if (!$result) {
                //print("</br>Error Description: " . mysqli_error($db));
                $valid_post = false;
                $error_msg .= "</br>Email already Registered</br>";
                $email_error = true;
            }
        }

        if (!$valid_post) {
            $name = $_POST["name"];
            $email = $_POST["email"];
        }
    } else {
        $valid_post = false;
    }
    ?>

    <main>
        <?php
        if ($valid_post) { ?>
        <h2>Congrats <?php echo $_POST["name"] ?>! You are now registered! </h2>
        <?php
        } else { ?>
        <h2>Register Below To Create Your Profile!</h2>
        <?php
            if ($error_msg) { ?>
        <div class="error-msg">
            <h3><?php echo $error_msg; ?></h3>
        </div>
        <?php
            }
            ?>
        <form action="register.php" method="post" class="form">
            <span class="<?php echo ($name_length_error) ? "error-label" : "normal-label"; ?> ">Name:</span>
            <input type="text" name="name" value="<?php echo $name ?>" required></br>
            <span class="<?php echo ($email_error) ? "error-label" : "normal-label"; ?> ">Email:</span> <input
                type="text" name="email" value="<?php echo $email ?>" required></br>
            <span class="<?php echo ($password_match_error) ? "error-label" : "normal-label"; ?> ">Password:</span>
            <input type="password" name="password" required></br>
            <span class="<?php echo ($password_match_error) ? "error-label" : "normal-label"; ?> ">Confirm
                Password:</span> <input type="password" name="confirm-password"></br>
            <input type="submit" value="Register" required></br>
        </form>
        <?php
        } ?>




    </main>

    <?php
    include("footer.php");
    ?>

</body>

</html>