<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="form.css">
    <style>
        .formborder table tr td {
            outline: none !important;
        }
    </style>
</head>
<body>
<?php 
    include 'connect.php';

    $user_id = $_SESSION['mySession'];

    $sql = "SELECT * FROM accounts WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    if (isset($_POST['btnUpdate'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $row['level'];

        $image = $_FILES['user_image']['name']; //Lấy tên ảnh
        $image_tmp_name = $_FILES['user_image']['tmp_name']; //Lấy địa chỉ của ảnh

        move_uploaded_file($image_tmp_name, '/usr/share/nginx/html/images/user_avatars/'.$image);


        $sql1 = "UPDATE accounts SET full_name = '$full_name', user_image = '$image', email = '$email', phone_number = '$phone_number', address = '$address', username = '$username', password = '$password', level = '$level' WHERE user_id = $user_id";
        
        mysqli_query($conn, $sql1);
        
        // header('location: index.php');
        // exit();    
    }
?>
<div class="form">
    <div class="formborder">
        <form action="index.php?act=user_info" method='post' enctype="multipart/form-data">
            <img src="https://docker-project-image-server-production.up.railway.app/images/user_avatars/<?php echo $row['user_image'] ?>" alt="" 
                style="width: 150px; height: 150px; border-radius: 50%; border: 1px solid black">
            <table>
                <tr>
                    <td>
                        <label for="full_name:">Full name: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $row['full_name']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="user_image:">Avatar: &nbsp</label>
                    </td>
                    <td>
                        <input type="file" id="user_image" name="user_image" value="<?php echo $row['user_image'] ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="email">Email: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $row['email']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone_number">Phone: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="phone_number" value="<?php echo $row['phone_number']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" name="address" value="<?php echo $row['address']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="username" name="username" value="<?php echo $row['username']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password: &nbsp</label>
                    </td>
                    <td>
                        <input type="password" id="password" name="password" value="<?php echo $row['password']?>">
                    </td>
                </tr>
            </table>
            <button type="submit" name="btnUpdate">Update</button>
        </form>
    </div>
</div>
</body>
</html>