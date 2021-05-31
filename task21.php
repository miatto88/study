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

// 出力するCSVのファイル名を現在時刻にしてください。
// ex)
// 201904041609.csv

$directory = "./csv/dev/fruits/";

const PRICE = [
    100,
    200,
    300
];

function getPrice() {
    return PRICE[array_rand(PRICE)];
}


function getStock() {
    return rand(0, 999);
}

date_default_timezone_set('Japan');
$today = date("YmdHi");

$fpRewrite = fopen($directory . $today . ".csv", "a");
fwrite($fpRewrite, "name,price,stock" . PHP_EOL);
fclose($fpRewrite);

$fpBase = fopen($directory . "fruits_base.csv", "r");

while ($line = fgets($fpBase)) {
    $price = getPrice();
    $stock = getStock();
    $line = sprintf("%s,%s,%s", rtrim($line, "\n"), $price, $stock) . PHP_EOL;
    // echo $line;
    $fpRewrite = fopen($directory . $today . ".csv", "a");
    fwrite($fpRewrite, $line);
    fclose($fpRewrite);
}

fclose($fpBase);


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

$directory = "./csv/dev/unique/";

if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}

$fp = fopen($directory . "uniqueId.csv", "a");
fwrite($fp, "id,uniqueId" . PHP_EOL);
// fclose($fp);

for ($i=1; $i<=100; $i++) {
    fwrite($fp, $i . "," . sprintf("%06d", rand(0,999999)) . "cd930000d" . 761 + $i . PHP_EOL);
}

fclose($fp);


// //75　ファイル分割
// 74の続き
// 74で出力したcsvファイルを読みこんで、
// 10個のファイルに分割して出力してください。
// なお、分割ファイルのファイル名は、それぞれuniqueId_1.php ~ のように連番とすること

// 10分割する為に行数を数える処理
$fp = fopen($directory . "uniqueId.csv", "r");
for ($count = 0; fgets($fp); $count++);
$splitCount = ceil(($count - 1) / 10);
fclose($fp);


$fpBase = fopen($directory . "uniqueId.csv", "r");

$head = fgets($fpBase); // 行頭の切り離し

for ($j = 1; $j <= 10; $j++) {
    $fpSplit = fopen($directory . "uniqueId_${j}.csv", "a");
    fwrite($fpSplit, $head);
    
    for ($i = 1; $i <= $splitCount; $i++) {
        $row = fgets($fpBase);
        fwrite($fpSplit, $row);
    }
    
    fclose($fpSplit);
}

fclose($fpBase);

?>