<?php

require_once '../app/Models/User.php';
require_once '../config/config.php';

$data = [
    'username' => 'new_user',
    'email' => 'new_user@example.com',
    'password' => 'password',
    'id_rek' => 1
];

$user = new User($pdo);
$user->create($data);

echo "User created successfully!";

?>
