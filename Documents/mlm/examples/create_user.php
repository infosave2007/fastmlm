<?php

require_once '../public/index.php';

// Пример добавления пользователя
$userId = $userController->createUser('John', 'Doe', 'john.doe@example.com', 1);
echo "Created user with ID: {$userId}\n";
?>