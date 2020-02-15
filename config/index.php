<?php
session_start();

function session_history($http_client)
{
    // user session     ip
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
        if (!isset($_SESSION['user_ip']) && $_SESSION['logged_in']==false) {
                $user_ip = $_SESSION['user_ip'];

                //  Ip Data
                // Insert  a record into session

                // check if ip on banlist
        }
        else{
                $user_ip = $_SESSION['user_ip'];
                $user_unique_id = $_SESSION['user_unique_id'];
                
                //  Ip Data
                // Insert  a record into session
        }
    }
}

  


$base_url	= "http://localhost/startupprojects/completed_projects/git-project/open-source-admin-panel/"; // <-- Change this link for the site to work!
// $base_url	= 'https://www.startupacquisition.com/'; // <-- Change this link for the site to work!

$servername 	= "localhost"; // <-- Dont Need to change this 
$username 		= "root"; // <-- Replace this username with the one you created in host panel
$password 		= ""; // <-- Replace this password with the one you created in host panel
$db				= "os_admin_panel"; // <-- Replace this DB name with the one you created in host panel

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

        //Just Create a table and inert into table

        // Create user Table 
        $query = "SELECT id FROM users";
        $result = mysqli_query($conn, $query);

        if (empty($result)) {
            $sql = "CREATE TABLE users(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_unique_id INT(50),
                u_role VARCHAR(50) NOT NULL,
                u_name VARCHAR(50) NOT NULL,
                f_name VARCHAR(30) NOT NULL,
                m_name VARCHAR(30) NOT NULL,
                l_name VARCHAR(30) NOT NULL,
                u_email VARCHAR(255) NOT NULL,
                u_city VARCHAR(255) NOT NULL,
                u_country VARCHAR(255) NOT NULL,
                u_address VARCHAR(255) NOT NULL,
                u_password VARCHAR(255) NOT NULL,
                register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

                if (mysqli_query($conn, $sql)) {
                    // Insert Dummer Data
                    echo "Table 'users' created successfully";
                } else {
                    echo "Error creating table: " . mysqli_error($conn);
                }
        }

        // Create user Table 
        $query = "SELECT id FROM cms_pages";
        $result = mysqli_query($conn, $query);

        if (empty($result)) {
            $sql = "CREATE TABLE cms_pages(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                p_random_id INT(50),
                p_name VARCHAR(255) NOT NULL,
                p_slug VARCHAR(255) NOT NULL,
                p_content TEXT NOT NULL,
                date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                date_edited TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

                if (mysqli_query($conn, $sql)) {
                    // Insert Dummer Data
                    echo "Table 'cms_pages' created successfully";
                } else {
                    // echo "Error creating table: " . mysqli_error($conn);
                }
        }


        // Create user Table 
        $query = "SELECT id FROM session_history";
        $result = mysqli_query($conn, $query);

        if (empty($result)) {
            $sql = "CREATE TABLE session_history(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                session_token INT(50),
                user_unique_id INT(50),
                user_ip VARCHAR(255) NOT NULL,
                country VARCHAR(255) NOT NULL,
                city VARCHAR(255) NOT NULL,
                logged_in VARCHAR(255) NOT NULL,
                date_and_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

                if (mysqli_query($conn, $sql)) {
                    echo "Table 'session_history' created successfully";
                } else {
                    // echo "Error creating table: " . mysqli_error($conn);
                }
        }

        // Create user Table 
        $query = "SELECT id FROM banned_ip ";
        $result = mysqli_query($conn, $query);

        if (empty($result)) {
            $sql = "CREATE TABLE banned_ip(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                ip VARCHAR(50),
                ban_reason VARCHAR(255) NOT NULL
                date_and_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

                if (mysqli_query($conn, $sql)) {
                    echo "Table 'banned_ip' created successfully";
                } else {
                    // echo "Error creating table: " . mysqli_error($conn);
                }
        }
}

function session_check()
{
    if (isset($_SESSION['logged_in'])) {
       return  redirect(0,'../index.php');
    }
}

function current_page()
{
    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $current_page = $parts[count($parts) - 1];
    $GLOBALS['current_page'] = $current_page;
}


function redirect($delay,$url){
    header("Refresh:$delay; url=$url");
}

// Cms Page Links
function cms_pages_urls()
{
    $conn = $GLOBALS['conn'];
    $query = "SELECT * FROM cms_pages";
    $result = mysqli_query($conn, $query);
    while ($cms_page =  mysqli_fetch_assoc($result)) {

        echo '
            <li class="nav-item">
                <a class="nav-link" href="page/index.php?page=cms&p='.$cms_page['p_random_id'].'">
                '.$cms_page['p_name'].'
                </a>
            </li>
        ';
    }
    echo'
        <li class="nav-item">
            <a class="nav-link" href="page/index.php?page=contact">
                Contact
            </a>
        </li>
    ';
}

function  contact()
{
    
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
            $current_users  = "SELECT * FROM `users` WHERE `u_name`='$user_name' AND `u_email`='$user_email'";
            $current_user12 = mysqli_query($conn, $current_users);
            $user_data = mysqli_fetch_assoc($current_user12);
            $current_rows   = mysqli_num_rows($current_user12);

            if ($current_rows > 0) {
                echo '<p class="alert alert-danger">User details already exist!</p>';
            }
            else{
                // Hashed Password
                $hashed_user_password	=   password_hash($user_password, PASSWORD_BCRYPT);
                $user_unique_id         =   rand(100000,1000000);

                // check if user inque id exist rub loop run untill a unique id is found the insert

                if ($user_unique_id != $user_data['user_unique_id']) {
                    // Register user
                    $register = "INSERT INTO `users`
                                (
                                    `user_unique_id`,
                                    `u_name`,
                                    `u_email`,
                                    `u_password`

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
                        redirect(2, '../index.php');
                    }
                    else{
                        echo '<p calert alert-danger">Oops something went wrong.</p>';
                    }
                }
            }

        }
    }
}

// Login Function
function log_in()
{
    if (isset($_POST['log_in'])) {

        $conn = $GLOBALS['conn'];

        // Get the Values
        $user_email         = filter_var(htmlspecialchars(trim($_POST['user_email'])), FILTER_SANITIZE_EMAIL);
        $user_password      = filter_var(htmlspecialchars(trim($_POST['user_password'])), FILTER_SANITIZE_STRING);

        if (empty($user_password) || empty($user_email)) {
            echo '<p class="alert alert-danger">Password or Email is empty!</p>';
        }
        else{
            // Check if user info available
            $current_user = "SELECT * FROM `users` WHERE `u_email` = '$user_email'";
            $current_user11 = mysqli_query($conn, $current_user);
            $user_row = mysqli_fetch_array($current_user11);
            echo $current_rows = mysqli_num_rows($current_user11);
            echo password_verify($user_password, $user_row['u_password']);

            if (password_verify($user_password, $user_row['u_password'])) {

                $_SESSION['user_unique_id'] = $user_row['user_unique_id'];
                $_SESSION['u_name'] = $user_row['u_name'];
                $_SESSION['logged_in'] = true;

                echo '<p class="alert alert-success">You have registered now.</p>';
                header('Location:../account/index.php?content=profile&user='.$_SESSION['user_unique_id']);
               
            }

            else {
                echo '<p class="alert alert-danger">Oops something went wrong!</p>';
            }
            
        }
    }
}

// Log Out
function log_out()
{
    $_SESSION['logged_in'] = false;
    session_destroy();
    return  redirect(2,'../index.php');
}

function log_in_history()
{

}

// User Info to edit
function user_info_edit()
{
    $conn = $GLOBALS['conn'];
    // Get the user_unique_id Value
    $user_unique_id = filter_var(htmlspecialchars(trim($_GET['user'])), FILTER_VALIDATE_INT);
    if (empty($user_unique_id)) {
        redirect($base_url.'index.php');
        // header('Location:'.$base_url.'index.php');
    }
    else{
        // check id user unique id exist
        $user = "SELECT `user_unique_id` FROM `users` WHERE `user_unique_id`='$user_unique_id'";
        $user1 = mysqli_query($conn, $user);
        $user_rows = mysqli_num_rows($user1);
        if ($user_rows < 1) {
            redirect(2,'../index.php');
            // header('Location:'.$base_url.'index.php');
        }
        else{
            $user_info  = "SELECT * FROM `users` WHERE `user_unique_id`='$user_unique_id'";
            $user_info1 = mysqli_query($conn, $user_info);
            $user = mysqli_fetch_assoc($user_info1);
            $GLOBALS['user'] = $user;
        
            if (isset($_POST['update_profile'])) {
                // To Edit need to get the form values
                $u_title = filter_var(htmlspecialchars(trim($_POST['u_title'])), FILTER_SANITIZE_STRING);
                $f_name = filter_var(htmlspecialchars(trim($_POST['f_name'])), FILTER_SANITIZE_STRING);
                $m_name = filter_var(htmlspecialchars(trim($_POST['m_name'])), FILTER_SANITIZE_STRING);
                $l_name = filter_var(htmlspecialchars(trim($_POST['l_name'])), FILTER_SANITIZE_STRING);
                $u_email = filter_var(htmlspecialchars(trim($_POST['u_email'])), FILTER_SANITIZE_STRING);
                // update the user info
                $update = "UPDATE `users` 
                SET 
                `u_title` = '$u_title',
                `f_name` = '$f_name',
                `m_name` = '$m_name',
                `l_name` = '$l_name',
                `u_email` = '$u_email'
                WHERE
                `user_unique_id` = $user_unique_id";
                $update1 = mysqli_query($conn, $update);
                if (!$update1) {
                    echo '<p class="alert alert-danger">Failed!</p>';
                    $url = '../account/index.php?content=profile&user='.$user_unique_id;
                    redirect(0,$url);
                }
                else{
                    echo '<p class="alert alert-success">Success!</p>';
                    $url = '../account/index.php?content=profile&user='.$user_unique_id;
                    redirect(0,$url);
                }
            }
        }
    }
}
// Change Password
function change_password()
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
            if (isset($_POST['change_password'])) {
                // To Edit need to get the form values
                $u_password = filter_var(htmlspecialchars(trim($_POST['new_password'])), FILTER_SANITIZE_STRING);
                $hashed_user_password	=   password_hash($u_password, PASSWORD_BCRYPT);
                // update the user info
                $update = "UPDATE `users` 
                SET 
                `u_password` = '$hashed_user_password'
                WHERE
                `user_unique_id` = $user_unique_id";
                $update1 = mysqli_query($conn, $update);
                if (!$update1) {
                    echo '<p class="alert alert-danger">Failed!</p>';
                }
                else{
                    echo '<p class="alert alert-success">Success!</p>';
                }
            }
        }
    }
}

// Change Email
function change_email()
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
            if (isset($_POST['change_email'])) {
                // To Edit need to get the form values
                $u_email = filter_var(htmlspecialchars(trim($_POST['new_email'])), FILTER_VALIDATE_EMAIL);
                // update the user info
                $update = "UPDATE `users` 
                SET 
                `u_email` = '$u_email'
                WHERE
                `user_unique_id` = '$user_unique_id' ";
                $update1 = mysqli_query($conn, $update);
                if (!$update1) {
                    echo '<p class="alert alert-danger">Failed!</p>';
                }
                else{
                    echo '<p class="alert alert-success">Success!</p>';
                }
            }
        }
    }
}

// Cms Page
?>