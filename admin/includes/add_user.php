<?php 

    if(isset($_POST['create_user'])){
        $user_username = $_POST['user_username'];
        $user_first_name = $_POST['user_first_name'];
        $user_last_name = $_POST['user_last_name'];
        $user_email = $_POST['user_email'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        $user_role = $_POST['user_role'];
        $user_password = $_POST['user_password'];
        global $connection;
        $user_password = mysqli_real_escape_string($connection, $user_password);

        //encrypt user_password
        $user_password = password_hash($user_password, PASSWORD_BCRYPT);
        move_uploaded_file($user_image_temp, "../images/$user_image");

        $query = "INSERT INTO users(user_last_name, user_username, user_first_name, user_image, user_password, user_role, user_email) VALUES ('{$user_last_name}', '{$user_username}', '{$user_first_name}', '{$user_image}', '{$user_password}', '{$user_role}', '{$user_email}')";
        $create_user_query = mysqli_query($connection, $query);
        confirmQuery($create_user_query);
        header("Location: users.php");
    }

?>



<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" class="form-control" name="user_username">
    </div>
    <div class="form-group">
        <label for="user_first_name">First Name</label>
        <input type="text" class="form-control" name="user_first_name">
    </div>
    <div class="form-group">
        <label for="user_last_name">Last Name</label>
        <input type="text" class="form-control" name="user_last_name">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_image">Profile Picture</label>
        <input type="file" class="" name="user_image">
    </div>
    <div class="form-group">
        <select name="user_role" id="">
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>   
        </select>
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>
</form>