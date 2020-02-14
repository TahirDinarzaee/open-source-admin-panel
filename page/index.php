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

if ($page  == 'register') {
// Registre Views
include('../views/cms/register-view.php');
   # code...
}
elseif ($page  == 'login') {
// login Views
include('../views/cms/login-view.php');
}
elseif ($page  == 'cms') {
    // CMS page view 
    include('../views/cms/cms-view.php');
}
elseif ($page == 'contact') {
    // Contact Page View
    include('../views/cms/contact-view.php');
}

?>

<?php   
    // Footer
    include('../config/footer.php');
?>