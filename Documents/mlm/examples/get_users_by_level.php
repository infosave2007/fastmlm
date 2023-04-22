<?php

require_once '../public/index.php';

// Пример получения пользователей на определенном уровне
$level = 2;
$users = $userController->getUsersByLevel($level);
echo "Users on level {$level}:\n";
foreach ($users as $user) {
    echo "ID: {$user['id']}, Name: {$user['first_name']} {$user['last_name']}\n";
}
?>