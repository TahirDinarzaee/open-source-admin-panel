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
include('../views/database-management/all-tables-view.php');
   # code...
}
elseif ($page  == 'add') {
// login Views
include('../views/database-management/add-tables-view.php');
}
elseif ($page  == 'edit') {
    // CMS page view 
    include('../views/database-management/edit-tables-view.php');
}
elseif ($page == 'delete') {
    // Contact Page View
    include('../views/database-management/delete-tables-view.php');
}

?>

<?php   
    // Footer
    include('../config/footer.php');
?>