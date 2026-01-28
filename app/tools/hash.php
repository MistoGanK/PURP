<?php
$hash = password_hash('1234', PASSWORD_BCRYPT);
echo $hash;
echo "\nLongitud: " . strlen($hash);
?>