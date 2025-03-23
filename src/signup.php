<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up </title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php 
    include 'connect.php';

    if (isset($_POST['btnSignUp'])) {
        $user_id = '';
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = 2;

        $sql = "INSERT INTO accounts (user_id, full_name, email, phone_number, address, username, password, level) 
                VALUES ('$user_id', '$full_name', '$email', '$phone_number', '$address', '$username', '$password', '$level')";
        
        mysqli_query($conn, $sql);

        header('location: login.php');
        exit();
    }
?>
<div class="form">
    <div class="formborder">
        <img src="./image/logo.jpg" alt="">
        <form action="signup.php" method='post'>
            <h1>Account</h1>
            <table>
                <tr>
                    <td>
                        <label for="full_name:">Full name: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="full_name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone_number">Phone number: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="phone_number">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="username" name="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password: &nbsp</label>
                    </td>
                    <td>
                        <input type="password" id="password" name="password">
                    </td>
                </tr>
            </table>
            <button type="submit" name="btnSignUp">Sign Up</button>
        </form>
    </div>
</div>
</body>
</html>