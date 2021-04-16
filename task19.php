<?php

// 口座残高を$creditとして宣言　初期値100,000円
$credit = 100000;

// 口座残高を出力する関数
function showCredit() {
    echo 'あなたの口座残高は' . $credit . '円です。' . PHP_EOL;
}

// 入出金の金額入力をチェックした結果を返す関数
function check($money) {
    // 未入力チェック
    if (empty($money)) {
        echo '金額を入力してください。';
        return false;
    }
    
    // intチェック
    if (!is_numeric($money)) {
        echo '金額を正の整数で入力してください。';
        return false;
    }

    return true;
}

// 標準入力





// 出金処理の関数
function depositMoney($money) {
    if (check($money) === false) {
        // バリデーションfalseの時の処理
    }

    $credit -= $money;

    showCredit();
}

// 入金処理の関数
function receiveMoney($money) {
    if (check($money) === false) {
        // バリデーションfalseの時の処理
    }

    $credit += $money;

    showCredit();
}


?>