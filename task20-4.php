<?php

// //70 ファイル関数
// 5つの果物の名前(string型)の要素をもつ配列を宣言してください。
// カレントディレクトリに、配列の中身を１行ずつ記載したCSVファイルを出力してください。
// CSVのファイル名はfruits.csvとします。ex)
// $fruits = array("apple", "banana", "orange); なら
// CSVファイルの中身は
// apple
// banana
// orange

$fruits = [
    "apple", "banana", "orange", "melon" ,"grape"
];

function createCsv1($rows) {
    $fp = fopen("fruits.csv", "w");
    
    if ($fp) {
        foreach ($rows as $row) {
            fwrite($fp, $row . PHP_EOL);
        }
    }
    
    fclose($fp);
}

createCsv1($fruits);


// //71
// 70.の続き
// csvファイルの出力場所を下記パスに変更してください。
// ./csv/dev/fruits/
// その際に、上記パスのディレクトリが存在しない場合は、再帰的にディレクトリを作成する処理を追加してください。
$directory = "./csv/dev/fruits/";

function createcsv2($lines, $directory) {
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    $fp = fopen($directory . "fruits.csv", "w");
    
    if ($fp) {
        foreach ($lines as $line[]) {  // $fputcsvの第二引数は配列指定の為
            fputcsv($fp, $line);
            $line = [];
        }
    }
    
    // echo $fp;
    fclose($fp);
}

createcsv2($fruits, $directory);


// //72
// 71.の続き
// 71で出力したcsvファイルに、それぞれ金額と在庫数の項目を追加したい。
// 71で出力したcsvファイルを読み込んで、金額と在庫数の項目を追加してください。
// なお金額は、100,200,300のうちのどれか、在庫数は999個以下のランダムな数字とする。
// ex)
// apple,100, 345
// banana,200,247
// orange,300,987

const PRICE = [
    100,
    200,
    300
];
// 変更 PRICE定数の要素をランダムで返す関数
function getPrice() {
    return PRICE[array_rand(PRICE)];
}

// 在庫数をランダムで返す関数
function getStock() {
    return rand(0, 999);
}


// 変更 $fpRewrite = fopen の位置を修正、fetcsv()をfgets()に書き換え
$fpBase = fopen($directory . "fruits.csv", "r");

while ($line = fgets($fpBase)) {
    $price = getPrice();
    $stock = getStock();
    $line = sprintf("%s,%s,%s", rtrim($line, "\n"), $price, $stock) . PHP_EOL;
    // echo $line;
    $fpRewrite = fopen($directory . "fruits_re.csv", "a");
    fwrite($fpRewrite, $line);
    fclose($fpRewrite);
}

fclose($fpBase);

if (file_exists($directory . "fruits.csv")) {
    unlink($directory . "fruits.csv");
    rename($directory . "fruits_re.csv", $directory . "fruits.csv");
}

?>