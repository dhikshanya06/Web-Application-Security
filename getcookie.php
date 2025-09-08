<?php

if(isset($_COOKIE["user_name"])) {
  $user_name = $_COOKIE["user_name"];
  echo "Welcome back, " . $user_name . "!";
} else {
  echo "No cookie found.";
}

?>
