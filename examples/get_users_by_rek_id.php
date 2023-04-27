<?php

require_once '../app/Models/User.php';
require_once '../config/config.php';

$rekId = 1;

$user = new User($pdo);
$usersByRekId = $user->getUsersByRekId($rekId);

echo "<pre>";
print_r($usersByRekId);
echo "</pre>";

?>
