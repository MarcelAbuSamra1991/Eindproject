<?php
include("sessions.php");
?>
<?php
$_SESSION["loggedin"] = null;
$_SESSION["SuccessMessage"] = null;
$_SESSION["ErrorMessage"] = null;

session_destroy();

header("Location:../Momgeving/login_admin.php");


?>