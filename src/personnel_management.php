<div class='edit-product'>
    <p style="width: 97.5%; text-align: center; font-size: 30px; font-weight: 700px; padding: 10px 0; margin: 20px; border-bottom: 1px solid black">
        Personnel Management
    </p>
    <div class="edit-product-table">
        <table>
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Phone_number</th>
                    <th>Address</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Tools</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    include "connect.php";

                    $sql = "SELECT * FROM accounts WHERE level = 1";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['full_name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone_number'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['password'];?></td>
                        <td><span><a href="delete_staff.php?this_name=<?php echo $row['username'] ?>">Delete</a></span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="add"><a href="index.php?act=add_staff" >Add</a></div> 
</div>
