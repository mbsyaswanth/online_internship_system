<?php
  include 'connection.php';
?>

<?php
// Start the session
session_start();
// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
// destroy cookie
setcookie("page_content", "", time() - (86400*2),"/");
setcookie("dash", "student_dashboard.php", time() - (86400*2), "/");
//redirect

header("Location: /internshala_project/index.php");
die();

// echo "<script>
//        window.location.href = '/internshala_project/index.php';
//     </script>";
?>
