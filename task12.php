<?php

echo 'NPCとじゃんけん勝負！' . PHP_EOL;
echo '何を出すか次の数字から選んでください。' . PHP_EOL;
echo '1：グー  2：チョキ  3：パー　';


// バリデーション 1～3以外はfalse
function check($input) {
    $check = ['1', '2', '3'];
    
    if (!in_array($input, $check, true)) {
        echo '1～3の数字で入力してください。' . PHP_EOL;
        return false;
    }
    
    return true;
}

// 自分の出す手を返す関数
function input() {
    $input = trim(fgets(STDIN));
    // バリデーションエラーの場合は再帰
    if (check($input) === false) {
        return input();
    }

    return $input;
}


// 数字をグーチョキパー表記で出力する関数
function hand($hand) {
    if ($hand === 1) {
        return 'グー';
    } elseif ($hand === 2) {
        return 'チョキ';
    } else {
        return 'パー';
    }
}

// 対戦結果を数値で返す関数
function result() {
    // お互いの手を数値で変数に格納
    $yourHand = intval(input());
    $npcHand = rand(1,3);

    // お互いの手を表示
    echo 'あなたの手：' . hand($yourHand) . '　NPCの手：' . hand($npcHand) . PHP_EOL;
    
    // 対戦結果を返す
    $result = $yourHand - $npcHand;
    // $resultが
        // -1か2の時は勝ち
        // 1か-2の時は負け
        // 0の時はあいこ

    return $result;
}

// 勝負を実行する関数
function battle() {
    $result = result();

    // 勝った時の処理
    if ($result === -1||$result === 2) {
        echo 'おめでとう！あなたの勝利です！';
    }

    // 負けた時の処理
    if ($result === 1||$result === -2) {
        echo '敗北です。次のあなたはきっとうまくやってくれるでしょう。';
    }

    // あいこの時の処理
    if ($result === 0) {
        echo 'あいこです。出す手をもう一度選択してください。' . PHP_EOL;

        // あいこの時は再帰
        return battle();
    } 
}

// 実行
battle();

?>