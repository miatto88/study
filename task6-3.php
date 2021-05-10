<?php

// 19, while文 do-while文
// 1000から2000までの間で1の桁が7の数字の最初の数字を求めて出力してください
// for文　while文　do-while文を使ってそれぞれ出力してください

// for文
for ($i = 1000; $i<= 2000; $i++) {
    if ($i % 10 === 7) { // 変更 シンプルに書ける
        echo $i . PHP_EOL;
        break;
    }
}

// while文
$i = 1000; // 初期化
while ($i <= 2000) {
    if ($i % 10 === 7) { // 変更 シンプルに書ける
        echo $i . PHP_EOL;
        break;
    }
    $i++;
}

// do-while文
$i = 1000;
do {
    if ($i % 10 === 7) { // 変更 シンプルに書ける
        echo $i . PHP_EOL;
        break;
    }
    $i++;
} while ($i <= 2000);


// 20. 関数の基礎
// int型の変数を宣言してください。
// 変数を渡して二乗の整数を返す関数を作成してください
function power(int $base_num, int $exp) { // 変更 変数名
    return $base_num ** $exp; // 変更 pow($num1, $num2) でも可
};
var_dump(power(7,3)) . PHP_EOL;


// 21. 関数の基礎2
// boolean型を渡すと別のboolean型を返す関数を作成してください
// ex) trueを渡す→falseが返ってくる
function boolReverse($bool) {
    if ($bool === true) {
        return false; // 変更 bool型で返す
    } elseif ($bool === false) {
        return true; // 変更 bool型で返す
    }
}
var_dump(boolReverse(false)) . PHP_EOL;


// 22.
// int型とString型の２つの変数を引数で渡すと 「int型:String型」という文字列を返す関数を作成してください
// ※int型,String型は引数で渡してください
// ex)出力例「 5: ああああ」
function test(int $int, string $str) {
    return sprintf("%d: %s", $int, $str); // 変更 sprintfを使用
}
var_dump(test(7,"みみみみ"));

?>