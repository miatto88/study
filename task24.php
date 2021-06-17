<?php

// //87
// コマンドラインからPHPファイルを実行する。
// コマンドラインの引数から、名前と年齢(int)を渡す。
// 「{string}さん、{int}歳の誕生日おめでとう！"」
// と出力するようにしてください。
// なお、引数のキーは任意とし、期待の型ではないときは、
// 「引数が不正です」と出力し、プログラムを終了させるようにしてください。

$name = $argv[1];
$age = $argv[2];

try {
    if (!is_string($name) || !is_numeric($age)) {
        throw new Exception("引数が不正です");
    }

    echo sprintf("%sさん、%d歳の誕生日おめでとう！", $name, $age) . PHP_EOL;
    
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    return false;
}


// //88
// //無名関数
// $greet　という変数に、「Hello, World!」と出力する無名関数を代入してください

$greet = function () {
    echo "Hello, World!" . PHP_EOL;
};

$greet();

// //89
// $nameという変数に、名前を意味する値を代入し、
// $greetという変数に$nameを渡して「Hello, {$name}!」と出力するような無名関数を代入してください。
// ※関数の引数は使用せずにuse構文を使用すること

$name = "yamada";

$greet = function () use ($name) {
    echo "Hello, " . $name . "!" . PHP_EOL;
};

$greet();

?>