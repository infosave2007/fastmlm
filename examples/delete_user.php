<?php

require_once '../public/index.php';

// Пример удаления пользователя
$userId = 5; // Замените на ID пользователя, которого вы хотите удалить
$userController->deleteUser($userId);
echo "Deleted user with ID: {$userId}\n";
?>