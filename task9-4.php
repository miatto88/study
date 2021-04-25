<?php


// 29,
// 5個のString(文字列)の配列を用意し適当な文字を代入してください。
// その2番目の値を出力してください。
$words = [
    'あ',
    'い',
    'う',
    'え',
    'お',
];

echo $words[1] . PHP_EOL;;


// 30,
// 10個のInteger(整数)の配列を用意し適当な値を代入してください。
// 添字が偶数番目の合計値と添字が奇数番目の合計値を出力してください。
$nums = [
    0,
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9
];


$even = 0;
$odd = 0;
for ($i = 0; $i < count($nums); $i++) {
    if ($i % 2 === 0) {
        $even += $nums[$i];
    } else {
        $odd += $nums[$i];
    }    
}
echo $even . PHP_EOL;
echo $odd . PHP_EOL;


// 31,
// Integer(整数)の配列を渡すと、配列の中身が３乗される関数を作ってください。
// なお、関数の中で引数に必要だと思うvalidationも作成してください。（validationの意味がわからない場合は、お調べください）

// 変更点 バリデーションを別関数にし、内容も一新
function check($nums) {
    if (empty($nums)) {
        echo '引数が空です';
        return false;
    }

    if (!is_array($nums)) {
        echo '引数が配列ではありません';
        return false;
    }

    foreach ($nums as $key => $num) {
        if (!is_int($nums[$key])) {
            echo '引数の要素が整数ではありません';
            return false;
        }
    }

    return true;
}

function pow3rd($nums) {
    if (check($nums) === false) {
        return;
    }
    foreach ($nums as $key => $num) {
        $nums[$key] = $num ** 3;
    }
    return $nums;
}

$array = [1, 2, 3];
var_dump(pow3rd($array));


// 32,
// 2つのInteger(整数)の配列を引数にもち、それぞれ同じ順番の値が合計された配列を作る関数を作ってください(配列を返り値として持つ)
// 作られる配列は２つの入力された配列のうち少ない個数の配列の個数とします。
function addnums($nums1, $nums2) {
    $newnums = [];
    $countmin = min(count($nums1), count($nums2));

    for ($i = 0; $i < $countmin; $i++) {
        $newnums[] = $nums1[$i] + $nums2[$i];
    }
    return $newnums;
}

$arry1 = [1, 2, 3];
$arry2 = [5, 6, 7];

$newnums = addnums($arry1, $arry2);
var_dump($newnums);

?>