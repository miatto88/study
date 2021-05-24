<?php 

// 変数の宣言

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


// 整数型の２つの変数を宣言
$num1 = 19;
$num2 = 7;
// 足す、引く、かける、割る、割った余りを出力
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


// 条件式とboolean(論理型)
// 初期値がfalseである論理型の変数を宣言
// ２つの変数を足した結果が偶数であれば、論理型の変数にtrueを代入
$boolA = false;
echo $boolA."\n"; // 空白になった。falseは空白になるらしい。
if ($add % 2 == 0) {
    $boolA = true;
}
echo $boolA."\n"; // trueは1らしい。
// echo "<br>";


// 条件式
// boolean型の変数を利用した条件式を作成
// ・偶数なら..... 「偶数です」
// ・奇数なら.....「奇数です」
if ($boolA == true) {
    echo "偶数です"."\n";
} else {
    echo "奇数です"."\n";
}

?>