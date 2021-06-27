<?php 

// 9. for文と条件式の組み合わせ3
// 20 ~ 50までの数字の中で2で割ったら奇数となる数字のみを出力
    // for ($i = 20; $i <= 50; $i++) {
    //     if ($i % 2 === 0 && $i % 4 !== 0) {
    //         echo $i . PHP_EOL;
    //     }
    // }
for ($i = 20; $i <= 50; $i++) {
    $half = $i / 2;
    if (is_float($half)) {
        continue;
    }
    if ($half % 2 === 1) {
        echo $i . PHP_EOL;
    }
}

// 10. for文と条件式の組み合わせ4
// 20 ~ 50までの数字の中で2で割ったら奇数となる数字の個数を出力
$count = 0;
for ($i = 20; $i <= 50; $i++) {
    if ($i % 2 === 0 && $i % 4 !== 0) {
        $count++;
    }
}
echo $count . PHP_EOL;

// 11. for文を使用した計算
// 1000未満の「3と7の倍数」は何個あるか　個数を出力
$count = 0;
for ($i = 1; $i < 1000; $i++) {
    if ($i % 3 === 0 && $i % 7 === 0) {
        $count++;
    }
}
echo $count . PHP_EOL;

// 12. for文を使用した計算2
// 1000未満の「3と7の倍数」の5番目に大きい数を出力
    // $arry = [];
    // for ($i = 1; $i < 1000; $i++) {
    //     if ($i % 3 === 0 && $i % 7 === 0) {
    //         $arry[] = $i;
    //     }
    // }
    // $reverse = array_reverse($arry);
    // echo $reverse[4];
$count = 1;
for ($i = 1000; $i > 1; $i--) {
    if ($i % 3 === 0 && $i % 7 === 0) {
        $count++;
    }
    if ($count > 5) {
        break;
    }
}
echo $i;

?>