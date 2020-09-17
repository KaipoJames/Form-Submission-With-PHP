<?php
$db = connect_to_DB();

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
?>