<?php

$original_password = "admiN1337$";
$hashed_password = password_hash($original_password, PASSWORD_DEFAULT);

echo "Mot de passe original: $original_password<br>";
echo "Mot de passe haché: $hashed_password";

?>
