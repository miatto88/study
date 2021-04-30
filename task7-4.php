<?php

// 23.
// int型とboolean型を渡し boolean型がtrueなら　int型を1プラスする　falseなら1マイナスする関数を作成してください
function addOrSub(int $num, bool $bool) {
    if ($bool === true) {
        $num = $num + 1;
    } elseif ($bool === false) {
        $num = $num - 1;
    }
    return $num;
}
echo addOrSub(2,true) . PHP_EOL; // 確認用 echo

// 24.
// int型とString型を渡しそのint型の数値の回数分　型の内容Stringを出力する関数を作成してください
// (int型が0以下の場合　「範囲外の入力値です」と出力してください

function repeatStr(int $num, string $str) {
    if ($num <= 0) {
        echo "範囲外の入力値です";
        return;  // 変更点 バリデーションとメイン処理を分割
    }
    echo str_repeat($str, $num);
}
repeatStr(2, "あ");
echo PHP_EOL;


// ★★★★★★★★★★★★★★★
// せっかくですので、ここで追加問題といきますね。再帰関数の問題です。
// 設問13ですが、現状では２つの変数が固定値となっていますので、これをランダムな数字が代入された２つの値を返すような関数を作成してみましょう。
// また２つの変数の差がマイナスになる場合は、再度、同じ関数を呼び、再代入するような関数を作成してみてください。
// 13. 条件式
// 整数型の２つの変数を宣言してください。
// 上記で宣言した２つの変数の内、1つ目を2つ目で引いた数字が偶数、奇数、0で「偶数です」「奇数です」「0です」と表示させるような条件式を書いてください。
// $num1 = 19;
// $num2 = 7;

function getRandNums() {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    
    if ($num1 < $num2) {
        return getRandNums(); // 変更 returnを返し処理を終了させる
    }
    return [$num1, $num2];
}

function diffRandNums($num1, $num2) {
    $diff = $num1 - $num2;
    if ($diff === 0) {
        echo "0です";
    } elseif ($diff % 2 === 1) {
        echo "奇数です";
    } elseif ($diff % 2 === 0) {
        echo "偶数です";
    }
}
list($num1, $num2) = getRandNums(); // 変更 配列をlistで個別の変数に格納
// var_dump($randNums);
diffRandNums($num1, $num2);


?>