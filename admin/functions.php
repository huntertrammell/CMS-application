<?php
//can wrap this around any data going into the database, will generally prevent SQL injection
function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function confirmQuery($result){
    if(!$result){
        global $connection;
        die(mysqli_error($connection));
    }
}

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


?>