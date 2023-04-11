<?php

function compress($input) {
    $compressed = '';
    $length = strlen($input);
    for ($i = 0; $i < $length; $i += 2) {
        $chunk = substr($input, $i, 2);
        switch ($chunk) {
            case '00':
                $compressed .= '0';
                break;
            case '01':
                $compressed .= '1';
                break;
            case '10':
                $compressed .= '01';
                break;
            case '11':
                $compressed .= '10';
                break;
        }
    }
    return $compressed;
}

function decompress($compressed) {
    $decompressed = '';
    $length = strlen($compressed);
    for ($i = 0; $i < $length; ++$i) {
        $chunk = substr($compressed, $i, 1);
        switch ($chunk) {
            case '0':
                $decompressed .= '00';
                break;
            case '1':
                $decompressed .= '01';
                break;
            case '01':
                $decompressed .= '10';
                break;
            case '10':
                $decompressed .= '11';
                break;
        }
    }
    return $decompressed;
}

function decompress_combinations($compressed, $original_length) {
    $results = [];
    $length = strlen($compressed);
    for ($bit = 0; $bit < pow(2, $length); ++$bit) {
        $binary = str_pad(decbin($bit), $length, '0', STR_PAD_LEFT);
        $decompressed = '';
        for ($i = 0; $i < $length; ++$i) {
            $chunk = substr($binary, $i, 1);
            switch ($chunk) {
                case '0':
                    $decompressed .= '00';
                    break;
                case '1':
                    $decompressed .= '01';
                    break;
                case '01':
                    $decompressed .= '10';
                    break;
                case '10':
                    $decompressed .= '11';
                    break;
            }
        }
        if (strlen($decompressed) == $original_length) {
            $results[] = $decompressed;
        }
    }
    return $results;
}

$inputFile = 'input.txt';
$outputFile = 'output.txt';

$inputData = file_get_contents($inputFile);
$compressedData = compress($inputData);
file_put_contents($outputFile, $compressedData);

// Generate all decompression combinations and compare lengths
$compressedData = file_get_contents($outputFile);
$decompressionCombinations = decompress_combinations($compressedData, strlen($inputData));
print_r($decompressionCombinations);

?>
