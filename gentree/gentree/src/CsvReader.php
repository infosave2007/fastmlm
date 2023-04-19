<?php

namespace Gentree;

use SplFileObject;

class CsvReader
{
    private string $filePath; // Путь к файлу CSV

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    // Чтение CSV файла и преобразование его содержимого в массив
    public function read(): array
    {
        $rows = [];

        // Создаем объект файла для чтения
        $file = new SplFileObject($this->filePath);
        $file->setFlags(SplFileObject::READ_CSV);
        $file->setCsvControl(';', '"', '\\');

        // Чтение заголовков CSV файла
        $headers = $file->fgetcsv();
        if (!$headers) {
            throw new \RuntimeException('Не удалось прочитать заголовки CSV файла');
        }

        // Чтение данных CSV файла
        while (!$file->eof()) {
            $row = $file->fgetcsv();
            if (!$row || count($row) !== count($headers)) {
                continue;
            }
            $rows[] = array_combine($headers, $row);
        }

        return $rows;
    }
}
