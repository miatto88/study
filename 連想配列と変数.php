<?php
// 配列を宣言
$array = [
    'first_name' => 'joe',
    'last_name' => 'jonathan',
    'age' => 12
];

// 出力を書式を使いまわすので、変数化
$displayFullName = 'name : ' . $array['first_name'] . ' ' . $array['last_name'];
$displayAge = 'age : ' . $array['age'];

// 出力
echo $displayFullName . PHP_EOL; //出力 name : joe jonathan
echo $displayAge . PHP_EOL; //出力 age : 12


// 最初に宣言した内容を書き換える
$array['age'] = 23;

// 出力パターン1
echo $displayAge . PHP_EOL; // 出力 23と思いきや、12と出力される

// 出力パターン2
echo 'age : ' . $array['age']; //出力 こっちは23と出力される

?>