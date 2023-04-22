<?php

namespace App\Models;

use PDO;

class Transaction
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Вставьте здесь методы для работы с транзакциями
}
?>