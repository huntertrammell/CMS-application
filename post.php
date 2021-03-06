<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
<?php include "includes/db.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php
                    include "includes/db.php";
                    if(isset($_GET['p_id'])){
                        $post_id = $_GET['p_id'];
                    }
                    $query = "SELECT * FROM posts WHERE post_id = $post_id";
                    global $connection;
                    $select_post = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_post)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];

                            ?>
                            <!-- First Blog Post -->
                            <h2>
                                <a href="#"><?php echo $post_title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                            <hr>
                            <p><?php echo $post_content ?></p>

                            <hr>

                            <?php
                        }
                ?>
                


                <?php 
                    if(isset($_POST['create_comment'])){
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $comment_post_id = $_GET['p_id'];
                        $comment_date = date('d-m-y');
                        $query = "INSERT INTO comments (comment_author, comment_email, comment_content, comment_date, comment_post_id) VALUES ('{$comment_author}', '{$comment_email}', '{$comment_content}', now(), '{$comment_post_id}')";
                        $create_comment = mysqli_query($connection, $query);
                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $comment_post_id";
                        $increment_comment_count = mysqli_query($connection, $query);
                    }
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <input class="form-control" name="comment_author" type="text" placeholder="Author">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="comment_email" type="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                    $query= "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'Approved' ORDER BY comment_id ASC";
                    global $connection;
                    $get_comment_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($get_comment_query)){
                        $comment_date = $row['comment_date'];
                        $comment_author = $row['comment_author'];
                        $comment_content = $row ['comment_content'];
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>

            <?php include "includes/sidebar.php";?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php";?>