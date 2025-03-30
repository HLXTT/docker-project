<?php
    session_start();
    include 'connect.php';

    if (isset($_SESSION['mySession'])) {
        header('location: index.php');
    }

    if (isset($_POST['btnLogin'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) == 1) 
        {
            $id = mysqli_fetch_assoc($result)['user_id'];
            $_SESSION['mySession'] = $id;
            header('location: index.php');
        } 
        else 
        {
            echo "Invalid username or password";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

<div class='form'>
    <div class='formborder'>
        <img src="https://docker-project-image-server-production.up.railway.app/images/logo.jpg" alt="">
        <form action="login.php" method="post">
            <h1>Account</h1>
            <table>
                <tr>
                    <td>
                        <label for="username">Username: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password: &nbsp</label>
                    </td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>
            </table>
        <div style="display: flex; align-items: center; justify-content: space-around; width: 60%">
            <button type="submit" name="btnLogin">Login</button>
            <a href="signup.php">Sign up</a>
        </div>
        </form>
    </div>
</div>
</body>
</html>