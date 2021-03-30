<?php

// グーチョキパーを定数で宣言
const STONE = 1;
const SCISSORS = 2;
const PAPER = 3;

// 変更 勝敗を定数で宣言
const WIN = 2;
const LOSE = 1;
const DRAW = 0;

// 変更 1を入れたらゲームを続行する処理の為の定数を宣言
const ONEMORE = '1';

// 変更 出す手の選択肢を定数に格納
const CHOICE = '1：グー  2：チョキ  3：パー　';

const HAND_TYPE = [
    STONE => 'グー',
    SCISSORS => 'チョキ',
    PAPER => 'パー'
];

// 入力値をチェックする為の配列を定数で宣言
const INPUTEXISTS = ['1', '2', '3'];

// バリデーション 1～3以外はfalse
function check($input) {
    if (array_key_exists($input, INPUTEXISTS)) {
        return true;
    }
    
    echo '1～3の数字で入力してください。' . PHP_EOL;
    return false;
}

// 自分の出す手を入力する関数
function input() {
    $input = trim(fgets(STDIN));
    // バリデーションエラーの場合は再帰
    if (check($input) === false) {
        return input();
    }

    return $input;
}

// 自分の手を返す関数
function inputYourHand() {
    $yourHand = intval(input());
    return $yourHand;
}

// 相手の手を返す関数
function getNpcHand() {
    $npcHand = rand(1,3);
    return $npcHand;
}

// 互いの手を表示し、結果を0～2の数字で返す関数
function judge($yourHand, $npcHand) {
    echo 'あなたの手：' . HAND_TYPE[$yourHand] . '　NPCの手：' . HAND_TYPE[$npcHand] . PHP_EOL;
    $judge = ($yourHand - $npcHand + 3) % 3;
    return $judge;
}

// もう一度勝負するか選択する関数
function oneMore() {
    echo 'もう一度遊ぶ場合は 1 を、終了する場合はそれ以外のキーを入力してください。';
    $input = trim(fgets(STDIN));
    if($input === ONEMORE) {
        battle();
    }
    return;
}

// 結果に応じてメッセージを表示する関数
function show($result) {
    if ($result === WIN) {
        echo 'おめでとう！あなたの勝利です！' . PHP_EOL;
        return true;
    }

    // 負けた時の処理
    if ($result === LOSE) {
        echo '敗北です。次のあなたはきっとうまくやってくれるでしょう。' . PHP_EOL;
        return true;
    }

    // あいこの時の処理
    if ($result === DRAW) {
        echo 'あいこです。出す手をもう一度選択してください。' . PHP_EOL;
        return false;
    } 
}

// 勝負を実行する関数
function battle() {
    echo '何を出すか次の数字から選んでください。' . PHP_EOL;
    echo CHOICE;

    $yourhand = inputYourHand();
    $npchand = getNpcHand();
    $result = judge($yourhand, $npchand);
    if (show($result) === true) {
        oneMore();
    } else {
        battle();
    };
}

// 実行
battle();

?>
