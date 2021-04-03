<?php

// 37,三項演算子
// Integer(整数)の変数を2つ、String(文字列)の変数を1つ宣言してください。
// 2つのint型変数の合計が100未満なら「100未満」、そうじゃなければ「100以上」とString(文字列)に三項演算子(条件演算子)を使って代入して、出力してください。
$num1 = 50;
$num2 = 51;
$add = $num1 + $num2;
$word = 'あ';

$word = $add < 100 ? '100未満' : '100以上';
echo $word . PHP_EOL;


// 38,文字列検索
// string型の変数を２つ宣言してください。
// 第二引数のString(文字列)が第一引数に含まれているかどうかのboolean型を返す関数を作成してください。
$word1 = 'シーフードドリア';
$word2 = 'フード';

function serchLet($str1, $str2) {
    if (strpos($str1, $str2) === false) {
        return false;
    } else {
        return true;
    }
}

var_dump(serchLet($word1, $word2));


// 39, 標準入力
// PHPファイルはコマンドラインから実行してください。
// 仕様
// 「あなたの名前を教えてください。」出力
// ↓
// 入力 ex) Micael
// ↓
// 「Micaelさん、あなたの年齢は何歳ですか？」出力
// ↓
// 入力 ex) 20
// ↓
// 「Micaelさん（年齢:20）、ご登録ありがとうございます！」出力
// ↓
// プログラム終了

// inputName, inputAgeというような関数を作成して
// この関数を通して標準入力してみてください
// また、バリデーションも実装してみましょう
// 今回のチェックしたい内容は
// 名前
// ・空チェック
// ・10文字以内
// 年齢
// ・空チェック
// ・数字であること
// バリデーションを実装していただき、もし不正な値を入力した場合は、
// 再度、入力させるような処理にしてみてください


function checkName($name) {
    if (empty($name)) {
        echo '名前が未入力です。もう一度入力してください。';
        return false;
    } 
    
    if (strlen($name) > 10) {
        echo '名前は10文字以内で入力してください。';
        return false;
    }
    
    return true;
}

function checkAge($age) {
    if (empty($age)) {
        echo '年齢が未入力です。もう一度入力してください。';
        return false;
    } 
    
    if (!is_numeric($age)) {
        echo '数字を入力してください。';
        return false;
    }
    
    return true;
}

//  変更点　input関数でバリデーションを呼び分け

function input($type) {

    $input = trim(fgets(STDIN));

    if ($type === 'name') {
        $check = checkName($input);
    }

    if ($type === 'age') {
        $check = checkAge($input);
    }

    if ($check === false) {
        return input($type);
    }

    return $input;
}

echo 'あなたの名前を教えてください。';
$name = input('name');

echo $name . 'さん、あなたの年齢は何歳ですか？';
$age = input('age');

echo $name . 'さん（年齢:' . $age . '）、ご登録ありがとうございます！';

?>