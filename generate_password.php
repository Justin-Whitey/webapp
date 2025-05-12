<?php
$hashedPassword = password_hash('hamster', PASSWORD_BCRYPT);
echo $hashedPassword;
?>
