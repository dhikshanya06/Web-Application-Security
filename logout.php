<?php
session_start();
// clear session
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

// clear remember cookie
setcookie("remember_user", "", time()-3600, "/");

header("Location: login_session.php");
exit;
