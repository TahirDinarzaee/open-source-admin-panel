<?php
// Head Content
include('config/head-content.php');    
// Header Nav Links
include('config/header.php');

function db_connection()
{
    if (isset($_GET['db_host'])) {
        $servename 	    = $_GET['db_host'];// <-- Dont Need to change this 
        $username 		= $_GET['db_user']; // <-- Replace this username with the one you created in host panel
        $password 		= $_GET['db_password'];// <-- Replace this password with the one you created in host panel
        $db			    = $_GET['db_name']; // <-- Replace this DB name with the one you created in host panel
        // Create conn1ection
        $conn1 			= mysqli_connect($servename, $username, $password, $db); // <-- Dont Change any of this 
        if (!$conn1) {
            message('Error in Connecting to DB!','danger');
        }
        else{
            message('Connected to DB!','success');
            $GLOBALS['conn1'] = $conn1;
        }
    }
    else{
        message('Enter DB Informations!','warning');
    }
}
function install_db()
{
    $conn1 = $GLOBALS['conn1'];
    // Create db Table 
    // $query = "SELECT id FROM db";
    // $result = mysqli_query($conn1, $query);

    // if (empty($result)) {
    //     $sql = "CREATE TABLE db(
    //         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //         d_name VARCHAR(255),
    //         d_user VARCHAR(50),
    //         d_password VARCHAR(50),
    //         d_host VARCHAR(50)
    //         )";

    //         if (mysqli_query($conn1, $sql)) {
    //             // Insert Dummer Data
    //              message('Database Table Created', 'success');

    //             // insert the database creduen,tials
    //             $db_name = filter_var(htmlspecialchars(trim($_GET['db_name'])), FILTER_SANITIZE_STRING);
    //             $db_user = filter_var(htmlspecialchars(trim($_GET['db_user'])), FILTER_SANITIZE_STRING);
    //             $db_host = filter_var(htmlspecialchars(trim($_GET['db_host'])), FILTER_SANITIZE_STRING);
    //             $db_password = filter_var(htmlspecialchars(trim($_GET['db_password'])), FILTER_SANITIZE_STRING);

    //             $insert_db_info = "INSERT INTO db (`d_name`, `d_user`,`d_password`,`d_host`)Values('$db_name','$db_user','$db_password','$db_host')";
    //             $insert_db_info1 = mysqli_query($conn1, $insert_db_info);
    //         } else {
    //              message('Error creating banned_ip table:'.mysqli_error($conn1), 'danger');
    //         }
    // }

    // Create Users Table 
    $query = "SELECT id FROM users";
    $result = mysqli_query($conn1, $query);

    if (empty($result)) {
        $sql = "CREATE TABLE users(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_unique_id INT(50),
            u_role VARCHAR(50) NOT NULL,
            u_permissions VARCHAR(50),
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

            if (mysqli_query($conn1, $sql)) {
                // Insert Dummer Data
                 message('user Table Craeted', 'success');
                 echo '<br>';
                // insert the database creduentials
            } else {
                echo '<li>';
                 message('Error creating user table:'.mysqli_error($conn1), 'danger');
                 echo '</li>';
            }
    }

    // Create CMS Table 
    $query = "SELECT id FROM cms_pages";
    $result = mysqli_query($conn1, $query);

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

            if (mysqli_query($conn1, $sql)) {
                // Insert Dummer Data
                message('Database Table Craeted', 'success');
                echo '<br>';
                // insert the database creduentials
            } else {
                echo '<li>';
                message('Error creating Database table:'.mysqli_error($conn1), 'danger');
                echo '</li>';
            }
    }

    // Create Create Sesion History Table 
    $query = "SELECT id FROM session_history";
    $result = mysqli_query($conn1, $query);

    if (empty($result)) {
        $sql = "CREATE TABLE session_history(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            session_token INT(50),
            user_unique_id INT(50),
            user_ip VARCHAR(255) NOT NULL,
            country VARCHAR(255) NOT NULL,
            city VARCHAR(255) NOT NULL,
            url_path VARCHAR(255),
            logged_in VARCHAR(255) NOT NULL,
            date_and_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            if (mysqli_query($conn1, $sql)) {
                // Insert Dummer Data
                message('session_history Table Craeted', 'success');
                echo '<br>';
                // insert the database creduentials
            } else {
                echo '<li>';
                message('Error creating session_history table:'.mysqli_error($conn1), 'danger');
                echo '</li>';
            }
    }

    // Create Banned IP Table 
    $query = "SELECT id FROM banned_ip";
    $result = mysqli_query($conn1, $query);

    if (empty($result)) {
        $sql = "CREATE TABLE banned_ip(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            ip VARCHAR(50),
            ban_reason VARCHAR(255) NOT NULL,
            date_and_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            if (mysqli_query($conn1, $sql)) {
                // Insert Dummer Data
                message('banned_ip Table Craeted', 'success');
                echo '<br>';
                // insert the database creduentials
            } else {
                echo '<li>';
                message('Error creating banned_ip table:'.mysqli_error($conn1), 'danger');
                echo '</li>';
            }
    }
}

?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <?php 
                   db_connection();
                ?>
                <br>
            </div>
        </div>
        <div class="row">
        <br>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Add DB Credentials</h4>
                    </div>
                    <div class="card-body">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="">Database Name</label>
                            <input type="text" name="db_name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database Username</label>
                            <input type="text" name="db_user" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database User Password</label>
                            <input type="password" name="db_password" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Host Name</label>
                            <input type="text" name="db_host" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="install" value="Install" class="form-control btn btn-success">
                        </div>
                    </form>
                    </div>
                    <div class="card-footer">
                        <p class="text-danger text-center">Note! After installing the file will git deleted!</p>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                        <h4>By default we will install the following table;</h4>
                        </div>
                        <div class="card-body">
                            
                            <ul>
                                <li>
                                    'users' 
                                </li>
                                <li>
                                    'session_history'
                                </li>
                                <li>
                                    'banned_ip'
                                </li>
                                <li>
                                    'cms_pages'
                                </li>
                            </ul>
                            <?php if(isset($_GET['db_host'])) {install_db();} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php   
    // Footer
    include('config/footer.php');
?>