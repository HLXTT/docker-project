<?php
    include 'connect.php';

    if (isset($_POST['btnAdd'])) {
        $user_id = '';
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = 1;

        $sql = "INSERT INTO accounts (user_id, full_name, email, phone_number, address, username, password, level) 
                VALUES ('$user_id', '$full_name', '$email', '$phone_number', '$address', '$username', '$password', '$level')";
        
        mysqli_query($conn, $sql);

        header('location: index.php?act=personnel_management');
        exit();
    }
?>



<div class="edit-product-form" style='min-width: 400px !important; width: 25%'>
    <form action="index.php?act=add_staff" method="post" enctype="multipart/form-data">
        <div style="display: flex; align-items: center; text-align: center; width: 100%"><h3 style="width: 100%; font-size: 25px; margin: 20px 0">Add staff</h3></div>
        <table>
                <tr>
                    <td>
                        <label for="full_name">Full name: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="name" name="full_name">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="email" name="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone_number">Phone number: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="brand" name="phone_number">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address: &nbsp</label>
                    </td>
                    <td>
                        <input type="text" id="address" name="address">
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
            <button id="add" name="btnAdd">Add</button>
        </form>
    </div>
</div>