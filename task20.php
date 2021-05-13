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
        foreach ($arrays as $array[]) {  // $fputcsvの第二引数は配列指定の為
            fputcsv($fileopen, $array);
            $array = [];
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


// 多次元配列で宣言
$fruits2 = [
    ["apple"],
    ["banana"],
    ["orange"],
    ["melon"],
    ["grape"]
];

function rewritecsv($arrays, $directory) {
    $price = [100, 200, 300];
    // $price配列のキーをランダムで返す関数
    function keys($price) {
        return array_rand($price);
    }

    // 在庫数をランダムで返す関数
    function counts() {
        return rand(0, 999);
    }

    $fileopen = fopen($directory . "fruits.csv", "r+");    
    
    while ($array = fgetcsv($fileopen)) {
        $array[] = $price[keys($price)];
        $array[] = counts();
        $newarrays[] = $array;
    }

    // ファイルポインタの位置を先頭に戻す
    rewind($fileopen);

    if ($fileopen) {
        foreach ($newarrays as $line) {
            fputcsv($fileopen, $line);
        }
    }

    fclose($fileopen);
}

rewritecsv($fruits2, $directory);

?>