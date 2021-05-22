<?php 

// 1. 基本的な変数の宣言
// 以下の指定された条件に合うような値を変数に代入して宣言してください。
// ・整数（int） $number: 5
// ・文字列（string） $text: test
// ・論理型（boolean） $flag: true
// ・null型 $test: null
$num = 5;
$text = "test";
$flag = true;
$test = null;

echo $num."\n";
// echo "<br>";
echo $text."\n";
// echo "<br>";
echo $flag."\n";
// echo "<br>";
echo $test."\n"; //nullがechoできなかったので下行にifで表現
if ($test === null) {
    echo "nullです"."\n";
}
// echo "<br>";


// 2. 基本的な計算
// 整数型の２つの変数を宣言してください。
$num1 = 19;
$num2 = 7;
// 2つの変数を用いて、　足す、引く、かける、割る、割った余りを出力してください。
$add = $num1 + $num2;
$minus = $num1 - $num2;
$kakezan = $num1 * $num2;
$warizan = $num1 / $num2;
$amari = $num1 % $num2;

echo $add."\n";
// echo "<br>";
echo $minus."\n";
// echo "<br>";
echo $kakezan."\n";
// echo "<br>";
echo $warizan."\n";
// echo "<br>";
echo $amari."\n";
// echo "<br>";


// 3. 条件式とboolean(論理型)について
// 初期値がfalseである論理型の変数を宣言してください。
// 問題2で宣言した２つの変数を足した結果が偶数であれば、論理型の変数にtrueを代入してください。
$boolA = false;
echo $boolA."\n"; // 空白になった。falseは空白になるらしい。
if ($add % 2 == 0) {
    $boolA = true;
}
echo $boolA."\n"; // trueは1らしい。
// echo "<br>";


// 4. 条件式
// 設問3のboolean型の変数を利用した条件式を作成し、以下のように出力してください。
// ・偶数なら..... 「偶数です」
// ・奇数なら.....「奇数です」
if ($boolA == true) {
    echo "偶数です"."\n";
} else {
    echo "奇数です"."\n";
}

?>