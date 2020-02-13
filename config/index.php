<?php
session_start();
// user session ip
if (!empty($_SERVER["HTTP_CLIENT_IP"])){
  //check for ip from share internet
  $user_ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
  // Check for the Proxy User
  $user_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else{
  $user_ip = $_SERVER["REMOTE_ADDR"];
  $_SESSION['user_ip'] = $user_ip;
  $user_ip = $_SESSION['user_ip'];
}

$base_url	= "http://localhost/startupprojects/completed_projects/git-project/open-source-admin-panel/"; // <-- Change this link for the site to work!
// $base_url	= 'https://www.startupacquisition.com/'; // <-- Change this link for the site to work!

$servername 	= "localhost"; // <-- Dont Need to change this 
$username 		= "root"; // <-- Replace this username with the one you created in host panel
$password 		= ""; // <-- Replace this password with the one you created in host panel
$db				= "os_admin_panel"; // <-- Replace this DB name with the one you created in host panel
$register    = htmlspecialchars($_SERVER['PHP_SELF']).'?page=register';

// Create connection
$conn 			= mysqli_connect($servername, $username, $password, $db); // <-- Dont Change any of this 

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // <-- Dont Change any of this
}
else{

    // Create database
        // $sql = "CREATE DATABASE os_admin_panel";
        // if (mysqli_query($conn, $sql)) {
        //     echo "Database created successfully";
        // } else {
        //     echo "Error creating database: " . mysqli_error($conn);
        // }
        // Create user Table 
        $query = "SELECT id FROM users";
        $result = mysqli_query($conn, $query);

        if (empty($result)) {
            $sql = "CREATE TABLE users (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_unique_id INT(50),
                u_name VARCHAR(50) NOT NULL,
                f_name VARCHAR(30) NOT NULL,
                m_name VARCHAR(30) NOT NULL,
                l_name VARCHAR(30) NOT NULL,
                user_email VARCHAR(50) NOT NULL,
                user_password VARCHAR(50) NOT NULL,
                register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

                if (mysqli_query($conn, $sql)) {
                    echo "Table 'users' created successfully";
                } else {
                    echo "Error creating table: " . mysqli_error($conn);
                }
        }
}

// Register Function
function register()
{
    if (isset($_POST['register'])) {

        $conn = $GLOBALS['conn'];

        // Get the Values
        $user_name          = filter_var(htmlspecialchars(trim($_POST['user_name'])), FILTER_SANITIZE_STRING);
        $user_email         = filter_var(htmlspecialchars(trim($_POST['user_email'])), FILTER_SANITIZE_EMAIL);
        $user_password      = filter_var(htmlspecialchars(trim($_POST['user_password'])), FILTER_SANITIZE_STRING);
        $confirm_password   = filter_var(htmlspecialchars(trim($_POST['confirm_password'])), FILTER_SANITIZE_STRING);

        if ($user_password != $confirm_password) {
            echo '<p class="alert alert-danger">Password not matching!</p>';
        }
        else{
            // Check if user info available
            $current_user = "SELECT * FROM `users` WHERE `u_name`='$user_name' AND `user_email`='$user_email'";
            $current_user1 = mysqli_query($conn, $current_user);
            $current_rows = mysqli_num_rows($current_user1);

            if ($current_rows > 0) {
                echo '<p class="alert alert-danger">User details already exist!</p>';
            }
            else{
                // Hashed Password
                $hashed_user_password	=   password_hash($user_password, PASSWORD_BCRYPT);
                $user_unique_id         =   rand(100000,1000000);

                // Register user
                $register = "INSERT INTO `users`
                            (
                                `user_unique_id`,
                                `u_name`,
                                `user_email`,
                                `user_password`

                            ) 
                            VALUES(
                                '$user_unique_id',
                                '$user_name',
                                '$user_email',
                                '$hashed_user_password'
                            )
                            ";
                $register1 = mysqli_query($conn, $register);

                if ($register) {
                    echo '<p class="alert alert-success">You have registered now.</p>';
                    //header('Location:'.$base_url.'account/index.php?content=profile&user=');
                }
                else{
                    echo '<p calert alert-danger">Oops something went wrong.</p>';
                }
            }

        }
    }
}

// User Info to edit
function user_info_edit()
{
    $conn = $GLOBALS['conn'];
    // Get the user_unique_id Value
    $user_unique_id = filter_var(htmlspecialchars(trim($_GET['user'])), FILTER_VALIDATE_INT);
    if (empty($user_unique_id)) {
        header('Location:'.$base_url.'index.php');
    }
    else{
        // check id user unique id exist
        $user = "SELECT `user_unique_id` FROM `users` WHERE `user_unique_id`='$user_unique_id'";
        $user1 = mysqli_query($conn, $user);
        $user_rows = mysqli_num_rows($user1);
        if ($user_rows < 1) {
            header('Location:'.$base_url.'index.php');
        }
        else{
            $user_info  = "SELECT * FROM `users` WHERE `user_unique_id`='$user_unique_id'";
            $user_info1 = mysqli_query($conn, $user_info);
            $user = mysqli_fetch_array($user_info1);
           
            // if (!$user) {
            //     echo '0';
            // }
            $u_name = $user['u_name'];
            $f_name = $user['f_name'];
            // return $m_name = $user['m_name'];
            // return $l_name = $user['l_name'];
            // return $u_email = $user['user_email'];
        }
    }

  

    // To Edit need to get the form values

    // update the user info


}
?>