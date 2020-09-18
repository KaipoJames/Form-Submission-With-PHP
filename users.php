<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>

<body>
    <?php
    include('header.php');

    function displayDatabaseUsers()
    {
        $db = connect_to_DB();
        $display_users_query = "SELECT * FROM users";
        $results = mysqli_query($db, $display_users_query);
        //print $results . "</br>";
        if (!$results) {
            print("</br>Error Description: " . mysqli_error($db));
            exit();
            //$valid_post = false;
            //$display_users_error = true;
        }
    ?>
    <p>There are <?php echo mysqli_num_rows($results) ?> members.</p>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Hashed Password</th>
        </tr>
        <?php
            while ($row = $results->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td>
                <a href="profile.php?id=<?php echo $row["id"]; ?>">
                    <?php echo $row["email"]; ?></a>
            </td>
            <td><?php echo $row["hashed_password"]; ?></td>
        </tr>
        <?php
            }
            ?>
    </table>
    <?php
    }


    include('footer.php');
    ?>
</body>

</html>