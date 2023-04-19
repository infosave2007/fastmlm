<?php

require_once __DIR__ . '/vendor/autoload.php';

use Gentree\CsvReader;
use Gentree\Gentree;

// Проверяем количество аргументов командной строки
if ($argc !== 3) {
    echo "Использование: php gentreetest.php <input.csv> <output.json> \n";
    exit(1);
}

// Загружаем входные параметры
$inputFile = $argv[1];
$outputFile = $argv[2];

// Создаем объект CsvReader и читаем данные из файла
$csvReader = new CsvReader($inputFile, ';', '"', 'UTF-8');
$data = $csvReader->read();

// Создаем объект Gentree и передаем ему данные
$gentree = new Gentree($data);

// Создаем исходное дерево из данных
$tree = $gentree->createTree();

// Расширяем дерево, добавляя связанные элементы
$extendedTree = $gentree->extendTree($tree);

// Преобразуем дерево в массив
$resultArray = [];
foreach ($extendedTree as $node) {
    $resultArray[] = $node->toArray();
}

// Кодируем результат в JSON и сохраняем его в файл
$jsonData = json_encode($resultArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents($outputFile, $jsonData);

// Выводим сообщение о успешном завершении
echo "Дерево успешно сгенерировано и сохранено в файле {$outputFile}\n";
