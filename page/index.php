<?php

// Atuhors of Os Admin Panel
// Tahir Dinarzaee
// Mirza Dinarzaee
// Hammal Dinarzaee
// 2020

// Head Content
include('../config/head-content.php');    
// Header Nav Links
include('../config/header.php');
?>

<?php

if (isset($_GET['page']) && !empty($_GET['page']) || isset($_GET['content']) && !empty($_GET['content'])) {
    $page = filter_var(htmlspecialchars(trim($_GET['page'])), FILTER_SANITIZE_STRING);
    
}

if ($page  == 'register') {
// Registre Views
logged_in();
include('../views/cms/register-view.php');
   # code...
}
elseif ($page  == 'login') {
logged_in();
// login Views
include('../views/cms/login-view.php');
}

elseif ($page  == 'log-out') {
// logout Views
session_destroy();
include('../views/cms/logout-view.php');
redirect(1,'../index.php');
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