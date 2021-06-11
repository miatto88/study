<?php

// //76
// try catch
// 1- 10 までのランダムな数字を変数に代入してください。
// もし生成した数字が奇数なら例外を発生させ、
// 「奇数です」と例外メッセージを出力してください。

// //77
// 例外が発生するしないに限らず、「例外処理を終了します」と出力するように実装してください。(finallyを利用して

$randNum = rand(1, 10);

try {
    // echo $randNum . PHP_EOL;
    if ($randNum % 2 === 1) {
        throw new Exception("奇数です");
    }
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
} finally {
    echo "例外処理を終了します" . PHP_EOL;
}


// //78
// exceptionクラスを継承した独自の例外クラスを宣言してください。
// 独自の例外クラスを使用して、エラーメッセージを出力してください。
class newException extends Exception {
}

try {
    if (is_int($randNum)) {
        throw new newException("例外です");
    }
} catch (newException $e) {
    echo $e->getMessage() . PHP_EOL;
} finally {
    echo "例外処理を終了します" . PHP_EOL;
}


// //79
// コマンドラインからphpファイル実行時、環境に合わせて出力内容を変えたい。
// 主な環境は、dev, stg, master の3つとする。
// コマンドラインに入力した環境変数を取得し、その環境変数を出力するような処理を書いてください。
// なお、実行コマンドは下記の通りとする。
// ex) ENV=stg php index.php
// #出力
// stg


// コマンドライン上で以下を実行
//set ENV=stg & php index.php

// php上でENVを設定する場合
putenv("ENV=stg");

$env = getenv("ENV");
echo $env;

?>