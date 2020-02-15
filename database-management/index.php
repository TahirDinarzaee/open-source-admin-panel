<?php
// Head Content
include('../config/head-content.php');    
// Header Nav Links
include('../config/header.php');
?>

<?php

if (isset($_GET['page']) && !empty($_GET['page']) || isset($_GET['content']) && !empty($_GET['content'])) {
    $page = filter_var(htmlspecialchars(trim($_GET['page'])), FILTER_SANITIZE_STRING);
    //  $content = filter_var(htmlspecialchars(trim($_GET['content'])), FILTER_SANITIZE_STRING);
}

if ($page  == 'all') {
// Registre Views
include('../views/database-management/all-view.php');
   # code...
}
elseif ($page  == 'add') {
// login Views
include('../views/database-management/add-databse-view.php');
}
elseif ($page  == 'edit') {
    // CMS page view 
    include('../views/database-management/edit-databse-view.php');
}
elseif ($page == 'delete') {
    // Contact Page View
    include('../views/database-management/delete-databse-view.php');
}

?>

<?php   
    // Footer
    include('../config/footer.php');
?>