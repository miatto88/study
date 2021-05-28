<?php

// //73
// 72の続き
// 出力するCSVファイルの1行目に出力項目をわかりやすいように追加したい。
// １行目に「name,price,stock」が表示されるように72のソースを改修してください。
// ex)
// name,price,stock
// apple,100, 345
// banana,200,247
// orange,300,987

$directory = "./csv/dev/fruits/";

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

if (file_exists($directory . "fruits_re.csv")) {
    unlink($directory . "fruits_re.csv");
}

$fpRewrite = fopen($directory . "fruits_re.csv", "a");
fwrite($fpRewrite, "name,price,stock" . PHP_EOL);
fclose($fpRewrite);

// 変更 $fpRewrite = fopen の位置を修正、fetcsv()をfgets()に書き換え
$fpBase = fopen($directory . "fruits.csv", "r");

while ($line = fgets($fpBase)) {
    $price = getPrice();
    $stock = getStock();
    $line = sprintf("%s,%s,%s", rtrim($line, "\n"), $price, $stock) . PHP_EOL;
    echo $line;
    $fpRewrite = fopen($directory . "fruits_re.csv", "a");
    // static $line = "name,price,stock" . PHP_EOL;
    fwrite($fpRewrite, $line);
    fclose($fpRewrite);
}

fclose($fpBase);

// if (file_exists($directory . "fruits.csv")) {
//     unlink($directory . "fruits.csv");
//     rename($directory . "fruits_re.csv", $directory . "fruits.csv");
// }


// 出力するCSVのファイル名を現在時刻にしてください。
// ex)
// 201904041609.csv
// //74
// 1-100までのidにそれぞれユニークなIDを紐つけたCSVファイルを出力したい。
// ユニークIDの仕様は、ランダムな数字6桁 + 一意なID13桁とする（計19桁）下記パスに出力してください。
// ./csv/dev/unique/
// 出力するファイル名はuniqueId.csvとする。
// ex)
// id, uniqueId
// 1,1057225cd930000d762
// 2,9561415cd930000d785
// ~
// //75　ファイル分割
// 74の続き
// 74で出力したcsvファイルを読みこんで、
// 10個のファイルに分割して出力してください。
// なお、分割ファイルのファイル名は、それぞれuniqueId_1.php ~ のように連番とすること

?>