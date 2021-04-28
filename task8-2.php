<?php

// 25,
// 配列を宣言してください
// Integer(整数) 1個の配列　
// String(文字列) 3個の配列
$nums = [7]; // 」変更 変数名
$words = ['あ', 'い', 'う'];

// 26,
// 配列は初期化の際に初めから配列の値の代入までまとめて行う事ができます。
// Integer(整数)　3個の配列で　　1,2,3という数字を値に持たせたい。
// 宣言、要素の確保ののちそれぞれに代入する配列の用意の仕方と
// 代入までまとめて行う書き方で用意する仕方にて配列を用意してください
$nums = []; // 変更 変数名
$nums[] = 1;
$nums[] = 2;
$nums[] = 3;

$nums = [1, 2, 3];

// 27,
// 26の続き、
// 用意した配列をfor文を使って値を出力してください。
// foreach文を使った値の出力をしてください。
for ($i = 0; $i < count($nums); $i++) {
    echo $nums[$i] . PHP_EOL;
}

foreach ($nums as $num) {
    echo $num . PHP_EOL; // 変更 変数名
}


// 28,
// 27の続き、
// 値を出力したあとにそれぞれの値の２乗の値を代入し直すよう修正してください。
for ($i = 0; $i < count($nums); $i++) {
    echo $nums[$i] . PHP_EOL;
    $nums[$i] = $nums[$i] ** 2;
}
var_dump($nums);

$nums = [1, 2, 3]; // #27の状態に初期化
foreach ($nums as $key => $num) {
    echo $num . PHP_EOL;
    $nums[$key] = $num ** 2; // 無限ループにならない？
}
var_dump($nums);

?>