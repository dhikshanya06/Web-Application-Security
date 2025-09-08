<?php
// Start the session (if not already started)
session_start();

// Check if username and password are provided
if (isset($_POST['username']) && isset($_POST['password'])) {

  // Simulate authentication (replace with actual login validation)
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username === 'admin' && $password === 'secret') {
    // Login successful, store username in session
    $_SESSION['username'] = $username;
    
    // Generate a unique session identifier (replace with a more robust method)
    $session_id = uniqid();
    
    // Set the session identifier in a cookie with appropriate parameters
    setcookie('session_id', $session_id, time()+60*60,"/"); // Expires in 1 hour, accessible across the website
    
    // Associate the session ID with the session on the server-side
    $_SESSION['session_id'] = $session_id;
    
   // header('Location: indexsession.php'); // Redirect to main page
  } else {
    echo "Invalid login credentials.";
  }
} else {
  echo "Please fill out the login form.";
}
?>
