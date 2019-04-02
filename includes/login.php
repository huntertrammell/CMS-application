<?php include "db.php";?>
<?php session_start();?>

<?php 

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE user_username = '{$username}'";
        $select_user = mysqli_query($connection, $query);
        if(!$select_user){
            die(mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($select_user)){
            $db_user_id = $row['user_id'];
            $db_user_password = $row['user_password'];
            $db_user_first_name = $row['user_first_name'];
            $db_user_last_name = $row['user_last_name'];
            $db_user_role = $row['user_role'];
            $db_user_username = $row['user_username'];
        }
    }
    if($username == $db_user_username && password_verify($password, $db_user_password)){
        $_SESSION['username'] = $db_user_username;
        $_SESSION['firstname'] = $db_user_first_name;
        $_SESSION['lastname'] = $db_user_last_name;
        $_SESSION['role'] = $db_user_role;
        header('Location: ../admin');
    } else {
        header('Location: ../index.php');
    }

?>