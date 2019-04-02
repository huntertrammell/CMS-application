<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
            <?php
            global $connection; 
            $query = "SELECT * FROM users";
            $users_admin = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($users_admin)){
                $user_username = $row['user_username'];
                $user_id = $row['user_id'];
                $user_first_name = $row['user_first_name'];
                $user_last_name = $row['user_last_name'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
                ?>
                <tr>
                    <td><?php echo $user_id;?></td>
                    <td><?php echo $user_username;?></td>
                    <td><?php echo $user_first_name;?></td>
                    <td><?php echo $user_last_name;?></td>
                    <td><?php echo $user_email;?></td>
                    <td><?php echo $user_role;?></td>
                    <td><a href="users.php?source=edit_user&u_id=<?php echo $user_id?>">Edit</a></td>
                    <td><a href="users.php?delete=<?php echo $user_id?>">Delete</a></td>
                </tr>
                <?php
            }
            if(isset($_GET['delete'])){
                if(isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'Admin'){
                        $user_id = $_GET['delete'];
                        $query =  "DELETE FROM users WHERE user_id = {$user_id}";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: users.php");
                        confirmQuery($delete_query);
                    }
                }
                
            }
        ?>
    </tbody>
</table>
                   