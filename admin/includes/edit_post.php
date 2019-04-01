<?php

        if(isset($_GET['p_id'])){
            $post_id = $_GET['p_id'];
            global $connection; 
        $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
            $posts_admin = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($posts_admin)){
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];
                $post_category_id = $row['post_category_id'];
                $post_date = $row['post_date'];
                $post_author = $row['post_author'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];
            }
        }
        if(isset($_POST['update_post'])){
            $post_title = $_POST['post_title'];
            $post_author = $_POST['post_author'];
            $post_category_id = $_POST['post_category_id'];
            $post_status = $_POST['post_status'];
            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('d-m-y');
            $post_comment_count = 4;
            move_uploaded_file($post_image_temp, "../images/$post_image");
            if(empty($post_image)){
                $query = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
                global $connection;
                $select_image = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_image)){
                    $post_image = $row['post_image'];
                }
            }
            $query = "UPDATE posts SET post_category_id = '{$post_category_id}', post_title = '{$post_title}', post_author = '{$post_author}', post_date = now(), post_image = '{$post_image}', post_content = '{$post_content}', post_tags = '{$post_tags}', post_comment_count = '{$post_comment_count}', post_status = '{$post_status}' WHERE post_id = '{$post_id}'";
            global $connection;
            $update_post = mysqli_query($connection, $query);
            confirmQuery($update_post);
            header("Location: posts.php");
        }
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Category </label>
        <select name="post_category_id" id="">
        <?php
            global $connection;
            $query = "SELECT * FROM categories";
            $get_categories = mysqli_query($connection, $query);
            confirmQuery($get_categories);
            while($row = mysqli_fetch_assoc($get_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                ?>
                <option value="<?php echo $cat_id?>"><?php echo $cat_title?></option>
                <?php
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <img src='../images/<?php echo $post_image?>' width='100'>
        <input type="file" class="" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>