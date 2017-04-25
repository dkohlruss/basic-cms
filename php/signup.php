<!DOCTYPE html>
<html>
    <head>
        <title>New User Signup</title>
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="center_text">Add New User</h1>
        <fieldset>
            <form action="signupSubmit.php" method="POST">
            <p>
                <label>Username: </label>
                <input type="text" name="username" maxlength="20" required />
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="pwd" maxlength="20" required />
            </p>
            <p>
                <input type="submit" value="Add User" />
            </p>
            </form>
        </fieldset>
    </body>
</html>
