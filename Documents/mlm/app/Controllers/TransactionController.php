<?php

namespace App\Controllers;

use App\Models\Transaction;
use PDO;

class TransactionController
{
    private $transactionModel;

    public function __construct(PDO $pdo)
    {
        $this->transactionModel = new Transaction($pdo);
    }

    // Вставьте здесь методы для работы с транзакциями
}
?>