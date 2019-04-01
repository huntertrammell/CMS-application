<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Author</th>
            <th>Comment</th>
            <th>In Response To</th>
            <th>Status</th>
            <th>Email</th>
            <th>Approve</th>
            <th>Unnaprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
            <?php
            global $connection; 
            $query = "SELECT * FROM comments";
            $comments_admin = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($comments_admin)){
                $comment_author = $row['comment_author'];
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_date = $row['comment_date'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_content = $row['comment_content'];
                ?>
                <tr>
                    <td><?php echo $comment_id;?></td>
                    <td><?php echo $comment_date;?></td>
                    <td><?php echo $comment_author;?></td>
                    <td><?php echo $comment_content;?></td>
                    <td>
                        <?php 
                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                            global $connection;
                            $select_id = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_id)){
                                $post_title = $row['post_title'];
                                $post_id = $row['post_id'];
                            }
                            echo "<a href='../post.php?p_id=$post_id'>$post_title</a>";
                        ?>
                    </td>
                    <td><?php echo $comment_status;?></td>
                    <td><?php echo $comment_email; ;?></td>
                    <td><a href="#">Approve</a></td>
                    <td><a href="#">Unnaprove</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <?php
            }
            // if(isset($_GET['delete'])){
            //     $target_post_id = $_GET['delete'];
            //     $query =  "DELETE FROM posts WHERE post_id = {$target_post_id}";
            //     $delete_query = mysqli_query($connection, $query);
            //     header("Location: posts.php");
            //     confirmQuery($delete_query);
            // }
        ?>
    </tbody>
</table>
                   