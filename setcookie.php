<?php
// Set cookie name, value, expiration time (seconds), path, domain, secure, and HttpOnly flags
$cookie_name = "user_name";
$cookie_value = "Arjun";
$expire = time() + (60 * 60 * 24); // Expires in 1 day
$path = "/"; // Accessible across the entire website
$domain = ""; // Defaults to current domain
$secure = false; // Not using secure HTTPS connection
$httponly = true; // Prevent JavaScript access

setcookie($cookie_name, $cookie_value, $expire, $path, $domain, $secure, $httponly);

?>
<!DOCTYPE html>
<html>
<body>

<p>Cookie set successfully!</p>

</body>
</html>
