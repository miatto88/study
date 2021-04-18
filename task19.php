<?php

// 暗証番号の配列を定数として宣言
const PASSWORD = [
    '',
    '0000',
    '1111'
];

// 処理の選択肢を定数で宣言
const SHOW = '1';
const RECEIVE = '2';
const DEPOSIT = '3';
const END = '0';

// 処理の選択肢を表示
const CHOICE = '1:残高照会  2:入金処理  3:出金処理  0:終了する' . PHP_EOL;

// 入力値をチェックする為の配列を定数で宣言
const INPUTEXISTS = ['1', '2', '3', '0'];


// 口座残高を$creditとして宣言　初期値100,000円
$credit = 100000;


// 暗証番号が存在するかチェックする関数
function checkPassword($password) {
    if (in_array($password, PASSWORD)) {
        return true;
    }
    
    echo '暗証番号が一致しません。' . PHP_EOL;
    return false;
}

// 処理選択の入力値をチェックする関数
function checkChoice($input) {
    if (array_key_exists($input, INPUTEXISTS)) {
        return true;
    }
    
    echo '0～3の数字で入力してください。' . PHP_EOL;
    return false;
}

// 入出金の金額入力値をチェックする関数
function checkMoney($money) {
    if (strcmp($money, intval($money)) !== 0) {
        echo '金額は 0 以上の整数で入力してください。' . PHP_EOL;
        return false;
    }
    
    return true;
}

// 標準入力
function input() {
    $input = trim(fgets(STDIN));

    return $input;
}

// 口座残高を出力する関数
function showCredit($credit) {
    echo 'あなたの口座残高は ' . $credit . ' 円です。' . PHP_EOL;

    // 続けて処理を選択
    return start($credit);
}

// 入金処理の関数
function receiveMoney($credit) {
    echo '入金金額を入力してください。' . PHP_EOL;

    $money = input();
    if (checkMoney($money) === false) {
        // バリデーションfalseの時の処理
        return receiveMoney($credit);
    }

    $credit += intval($money);
    echo $money  . ' 円を入金しました。' . PHP_EOL;

    // 続けて処理を選択
    return start($credit);
}

// 出金処理の関数
function depositMoney($credit) {
    echo '出金金額を入力してください。' . PHP_EOL;

    $money = input();
    if (checkMoney($money) === false) {
        // バリデーションfalseの時の処理
        return depositMoney($credit);
    }

    // 金額がマイナスになる時の処理
    if ($credit - intval($money) < 0) {
        echo '残高が不足している為、処理を中止しました。' . PHP_EOL;
        return start($credit);
    }
    
    $credit -= intval($money);
    echo $money  . ' 円を出金しました。' . PHP_EOL;

    // 続けて処理を選択
    return start($credit);
}

// 処理を実行する関数
function start($credit) {
    echo '実行する処理を選択してください。' . PHP_EOL;
    echo CHOICE;

    $input = input();

    // 入力値をチェック
    if (checkChoice($input) === false) {
        start($credit);
    }
    
    // 入力値別に処理を分岐
    if ($input === SHOW) {
        showCredit($credit);
    }

    if ($input === RECEIVE) {
        receiveMoney($credit);
    }

    if ($input === DEPOSIT) {
        depositMoney($credit);
    }

    if ($input === END) {
        echo 'プログラムを終了します。' . PHP_EOL;
        return;
    }
}

function pass() {
    echo '暗証番号を入力してください。(テスト版の為、未入力で可)' . PHP_EOL;
    $input = input();

    if (checkPassword($input) === false) {
        return pass();
    }

    return;
}

// 暗証番号の入力
pass();

// 実行
start($credit);

?>