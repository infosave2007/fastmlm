<?php

require_once 'Models/User.php';
require_once 'config/config.php';

$userId = 6;

$user = new User($pdo);
$user->delete($userId);

echo "User deleted successfully!";

?>