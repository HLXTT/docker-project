<div class='edit-product'>
    <p>Your Posters</p>
    <div class="edit-product-table">
        <table>
            <thead>
                <tr>
                    <th>Poster ID</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th colspan="2">Tools</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    include "connect.php";

                    $sql = "SELECT * FROM posters";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['poster_id'];?></td>
                        <td><img src="https://docker-project-image-server-production.up.railway.app/images/posters/<?php echo $row['poster_image'];?>" alt="" style="width: 100% !important; height: 200px !important"></td>
                        <td><?php echo $row['poster_type'];?></td>
                        <td><span><a href="delete_poster.php? this_id=<?php echo $row['poster_id']?>">Delete</a></span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="add"><a href="index.php?act=add_poster">Add</a></div>
</div>