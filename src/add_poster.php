<?php
    include 'connect.php';
    if (isset($_POST['btnAdd'])) {
        $image = $_FILES['image']['name']; //Lấy tên ảnh
        $image_tmp_name = $_FILES['image']['tmp_name']; //Lấy địa chỉ của ảnh

        $type = $_POST['type'];

        $sql = "INSERT INTO posters (poster_type, poster_image) VALUES ('$type', '$image')";

        mysqli_query($conn, $sql);

        move_uploaded_file($image_tmp_name, 'http://localhost:8081/images/posters/'.$image);

        header('location: index.php?act=poster');
        exit();
    }
?>

<div class="edit-product-form">
    <form action="index.php?act=add_poster" method="post" enctype="multipart/form-data">
        <div style="display: flex; align-items: center; text-align: center; width: 100%"><h3 style="width: 100%; font-size: 25px; margin: 20px 0">Add Product</h3></div>
        <table>
            <tr>
                <td>
                    <label for="image">Image: &nbsp</label>
                </td>
                <td>
                    <input type="file" id="image" name="image">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type">Type: &nbsp</label>
                </td>
                <td>
                    <select id="type" name="type">
                        <option value="main_poster">Main</option>
                        <option value="deal_poster">Deal</option>
]                    </select>                
                </td>
            </tr>

        </table>
            <button id="add" name="btnAdd">Add</button>
        </form>
    </div>
</div>