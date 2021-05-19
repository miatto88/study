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

function createcsv1($arrays) {
    $fileopen = fopen("fruits.csv", "w");
    
    if ($fileopen) {
        foreach ($arrays as $array) {  // $fputcsvの第二引数は配列指定の為
            // 変更 fwrite()に書き換え
            fwrite($fileopen, $array . PHP_EOL);
        }
    }
    
    fclose($fileopen);
}

createcsv1($fruits);


// //71
// 70.の続き
// csvファイルの出力場所を下記パスに変更してください。
// ./csv/dev/fruits/
// その際に、上記パスのディレクトリが存在しない場合は、再帰的にディレクトリを作成する処理を追加してください。
$directory = "./csv/dev/fruits/";

function createcsv2($arrays, $directory) {
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    $fileopen = fopen($directory . "fruits.csv", "w");
    
    if ($fileopen) {
        foreach ($arrays as $line[]) {  // $fputcsvの第二引数は配列指定の為
            fputcsv($fileopen, $line);
            $line = [];
        }
    }
    
    // echo $fileopen;
    fclose($fileopen);
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

// 変更 priceを変数で宣言
const PRICE = [
    100,
    200,
    300
];
// PRICE定数のキーをランダムで返す関数
function keys() {
    return array_rand(PRICE);
}

// 在庫数をランダムで返す関数
function getStock() {
    return rand(0, 999);
}

// 変更 #71で生成したcsvを配列として取得する関数
function getArrays($directory) {
    if (!file_exists($directory)) {
        echo "ファイルが存在しません";
        return false;
    }

    $fileopen = fopen($directory . "fruits.csv", "r");
    
    while ($row = fgetcsv($fileopen)) {
        $arrays[] = $row;
    }
    
    fclose($fileopen);

    return $arrays;
};


// 金額と在庫数の項目を追加する関数
function rewritecsv($arrays, $directory) {
    
    $fileopen = fopen($directory . "fruits.csv", "r+");    
    
    while ($row = fgetcsv($fileopen)) {
        $row[0] .= "," . PRICE[keys()] .  "," . getStock();
        $newarrays[] = $row;
    }

    // ファイルポインタの位置を先頭に戻す
    rewind($fileopen);
    
    // 変更 fwirteで書き換え
    if ($fileopen) {
        foreach ($newarrays as $array) {
            foreach ($array as $line) {
                fwrite($fileopen, $line . PHP_EOL);
            }
        }
    }
    
    fclose($fileopen);
}

$arrays = getArrays($directory);
rewritecsv($arrays, $directory);

?>