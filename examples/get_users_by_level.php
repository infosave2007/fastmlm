<?php

require_once '../app/Models/User.php';
require_once '../config/config.php';

$level = 2;

$user = new User($pdo);
$usersByLevel = $user->getUsersByLevel($level);

echo "<pre>";
print_r($usersByLevel);
echo "</pre>";
?>
