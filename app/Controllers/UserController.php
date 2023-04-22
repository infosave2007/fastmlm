<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Transaction;
use PDO;

class UserController
{
    private $userModel;
    private $transactionModel;

    public function __construct(PDO $pdo)
    {
        $this->userModel = new User($pdo);
        $this->transactionModel = new Transaction($pdo);
    }

    // Вставьте здесь методы для работы с пользователями
}
?>