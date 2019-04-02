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
            <th>Unapprove</th>
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
                    <td><a href="comments.php?approve=<?php echo $comment_id?>">Approve</a></td>
                    <td><a href="comments.php?unapprove=<?php echo $comment_id?>">Unapprove</a></td>
                    <td><a href="comments.php?delete=<?php echo $comment_id?>">Delete</a></td>
                </tr>
                <?php
            }
            if(isset($_GET['delete'])){
                $comment_id = $_GET['delete'];
                $query =  "DELETE FROM comments WHERE comment_id = {$comment_id}";
                $delete_query = mysqli_query($connection, $query);
                header("Location: comments.php");
                confirmQuery($delete_query);
                $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = $comment_post_id";
                $decrement_comment_count = mysqli_query($connection, $query);
            }
            if(isset($_GET['approve'])){
                $comment_id = $_GET['approve'];
                $query =  "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$comment_id}";
                $approve_query = mysqli_query($connection, $query);
                header("Location: comments.php");
                confirmQuery($approve_query);
            }
            if(isset($_GET['unapprove'])){
                $comment_id = $_GET['unapprove'];
                $query =  "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$comment_id}";
                $unapprove_query = mysqli_query($connection, $query);
                header("Location: comments.php");
                confirmQuery($unapprove_query);
            }
        ?>
    </tbody>
</table>
                   