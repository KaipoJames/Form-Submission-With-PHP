<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="question question-1">
        Handling Incorrect Form Submissions
        <div class="part-a answer">Example: Use an if statement to check if the users passwords do not match. I would
            also check if the email is already in use.
        </div>
        <div class="part-b answer">I would print out an error message to the user telling he/she what went wrong, then I
            would highlight the area where the error occured to make it more user friendly. To save the information they
            type in, I would save what they entered into a variable and when the form submits add the variable back into
            the input so the users input stays there. I would not do the same for passwords for security purposes.
        </div>
    </div>
    <div class="question question-2">
        User Data And Database
        <div class="part-a answer">Create a new form on the member page that instead of creating a new user, it updates
            a user.
        </div>
        <div class="part-b answer">To populate the update form, I would use SQL queries to modify the information
            instead of inserting information.
        </div>
        <div class="part-c answer">To keep track of what user to update, I would use the id of the user found in the
            query string.
        </div>
    </div>
    <div class="question question-3">
        Cookies and Sessions
        <div class="part-a answer">To remember if a user is logged in or not, we have cooikes and sessions.</div>
        <div class="part-b answer">Cookies are text data stored in the browser. The browser sends this data back to the
            server when the user returns to the page. Sessions are used for storing more sensitive information. Sessions
            IDʻs use cookies to store in a long string, the users information.
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>