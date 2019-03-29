<?php

function insert_categories(){
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "This field should not be empty";
        } else {
            global $connection;
            $query = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
            $create_category = mysqli_query($connection, $query);
            if(!$create_category){
                echo die($connection);
            }
        }
    }
}

function edit_categories(){
    if(isset($_GET['edit'])){
        $target_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = {$target_id}";
        global $connection;
        $select_id = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_id)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
        }
        include "includes/edit_category.php";
        if(isset($_POST['update'])){
            $cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$target_id}";
            global $connection;
            $update_id = mysqli_query($connection, $query);
            header("Location: categories.php");
            if(!$update_id){
                echo "UPDATE FAILURE";
            }
        }
    }
}

function delete_categories(){
    if(isset($_GET['delete'])){
        $target_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$target_id}";
        global $connection;
        $delete_id = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function get_posts(){
    global $connection;
    $query = "SELECT * FROM posts";
    $posts_admin = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_categories_admin)){
        $post_title = $row['post_title'];
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_author = $row['post_author'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
    }
}

?>