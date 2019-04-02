<?php

        if(isset($_GET['u_id'])){
            $user_id = $_GET['u_id'];
            global $connection; 
        $query = "SELECT * FROM users WHERE user_id = {$user_id}";
            $users_admin = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($users_admin)){
                $user_username = $row['user_username'];
                $user_first_name = $row['user_first_name'];
                $user_last_name = $row['user_last_name'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
            }
        }
        if(isset($_POST['update_user'])){
            $user_username = $_POST['user_username'];
            $user_first_name = $_POST['user_first_name'];
            $user_last_name = $_POST['user_last_name'];
            $user_email = $_POST['user_email'];
            $user_image = $_FILES['user_image']['name'];
            $user_image_temp = $_FILES['user_image']['tmp_name'];
            $user_role = $_POST['user_role'];
            global $connection;
            $user_password = mysqli_real_escape_string($connection, $user_password);
            if(empty($user_image)){
                $query = "SELECT * FROM users WHERE user_id = '{$user_id}'";
                global $connection;
                $select_image = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_image)){
                    $user_image = $row['user_image'];
                }
            }
            move_uploaded_file($user_image_temp, "../images/$user_image");
    
            $query = "UPDATE users SET user_last_name = '{$user_last_name}', user_username = '{$user_username}', user_first_name = '{$user_first_name}', user_image = '{$user_image}', user_role = '{$user_role}', user_email = '{$user_email}' WHERE user_id = '{$user_id}'";
            $update_user_query = mysqli_query($connection, $query);
            confirmQuery($update_user_query);
            header("Location: users.php");
        }
?>



<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" class="form-control" name="user_username" value="<?php echo $user_username ?>">
    </div>
    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" class="form-control" name="user_first_name" value="<?php echo $user_first_name ?>">
    </div>
    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input type="text" class="form-control" name="user_last_name" value="<?php echo $user_last_name ?>">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <img src='../images/<?php echo $user_image?>' width='100'>
        <input type="file" class="" name="user_image" value="<?php echo $user_image ?>">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>   
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
    </div>
</form>