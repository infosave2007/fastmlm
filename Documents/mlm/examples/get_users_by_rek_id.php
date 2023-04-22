<?php

require_once '../public/index.php';

// Пример получения пользователей с определенным рекомендателем
$rekId = 1;
$users = $userController->getUsersByRekId($rekId);
echo "Users with rek_id {$rekId}:\n";
foreach ($users as $user) {
    echo "ID: {$user['id']}, Name: {$user['first_name']} {$user['last_name']}\n";
}
?>