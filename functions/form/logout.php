<?php
 $_SESSION =[];
 setcookie('session_name','', time() -1, '/');
 session_destroy();
 header('Location: regis_form.php');

