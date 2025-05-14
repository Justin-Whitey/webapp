<?php
session_start();
session_destroy();
header("Location: about_us.php");
exit();
?>
