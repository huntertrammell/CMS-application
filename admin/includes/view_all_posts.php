<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
        </tr>
    </thead>
    <tbody>
            <?php
            global $connection; 
            $query = "SELECT * FROM posts";
            $posts_admin = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($posts_admin)){
                $post_title = $row['post_title'];
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_date = $row['post_date'];
                $post_author = $row['post_author'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];
                ?>
                <tr>
                    <td><?php echo $post_id;?></td>
                    <td><?php echo $post_date;?></td>
                    <td><?php echo $post_author;?></td>
                    <td><?php echo $post_title;?></td>
                    <td>
                        <?php 
                            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                            global $connection;
                            $select_id = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_id)){
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                            }
                            echo $cat_title;
                        ?>
                    </td>
                    <td><?php echo $post_status;?></td>
                    <td><?php 
                            if($post_image){
                                echo "<img src='../images/$post_image' width='100'>";
                            } else{
                                echo "No Image";
                            }
                    ;?></td>
                    <td><?php echo $post_tags;?></td>
                    <td><?php echo $post_comment_count;?></td>
                    <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id ?>">Edit</a></td>
                    <td><a href="posts.php?delete=<?php echo $post_id ?>">Delete</a></td>
                </tr>
                <?php
            }
            if(isset($_GET['delete'])){
                $target_post_id = $_GET['delete'];
                $query =  "DELETE FROM posts WHERE post_id = {$target_post_id}";
                $delete_query = mysqli_query($connection, $query);
                header("Location: posts.php");
                confirmQuery($delete_query);
            }
        ?>
    </tbody>
</table>
                   