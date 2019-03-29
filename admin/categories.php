<?php include "includes/header.php";?>
    <div id="wrapper">

        <?php include "includes/navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">

                            <?php 
            
                                insert_categories();

                            ?>

                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                                    <?php

                                    edit_categories();
                                    
                                ?>

                        </div>
                        <?php
                            global $connection;
                            $query = "SELECT * FROM categories";
                            $select_categories_admin = mysqli_query($connection, $query);
                        ?>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($select_categories_admin)){
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $cat_id;?></td>
                                            <td><?php echo $cat_title;?></td>
                                            <td><a href="categories.php?delete=<?php echo $cat_id;?>">Delete</a></td>
                                            <td><a href="categories.php?edit=<?php echo $cat_id;?>">Edit</a></td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                <?php

                                        delete_categories();

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php";?>
