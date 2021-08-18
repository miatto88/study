<?php

// 16, 図形の表示
//  0
//  00
//  000
// この図形をfor文を使って出力。
for ($i = 1; $i <= 3; $i++) {
    echo str_repeat("0", $i);
    echo PHP_EOL;
}
echo PHP_EOL;

// 17, 図形の表示
//    0
//   000
//  00000
// この図形をfor文を使って出力。
$count = 0;
for ($i = 0; $i <= 5; $i++) {
    if ($i % 2 === 1) {
        echo str_repeat(" ", abs(2 - $count));
        echo str_repeat("0", $i);
        echo PHP_EOL;
        $count++;
    }
}
echo PHP_EOL;

// 18, 図形の表示
//    0
//   000
//  00000
//   000
//    0
// この図形をfor文を使って出力。
$count = 0;
for ($i = -5; $i <= 5; $i++) {
    if ($i % 2 === 0) {
        echo str_repeat(" ", abs(2 - $count));
        echo str_repeat("0", 5 - abs($i)); // $i=0の時、第2引数が最大
        echo PHP_EOL;
        $count++;
    }
}

?>