<?php

// 41
// $x = "abcaあいう"; と宣言する
// 「あいう」という文字のみを切り抜いて表示してください
$x = "abcaあいう";
echo substr($x,4);

// 42
// 次の配列を宣言する
// $array1 = array('あ', 'い', 'う', 'え', 'お');
// 降順にソートして出力してください
// ex) おえういあ
$array1 = array('あ', 'い', 'う', 'え', 'お');
rsort($array1);
foreach ($array1 as $array) {
    echo $array;
};

// 43
// 42の機能を関数にしてください

// 配列を降順にして出力する関数
function arrayReverse($array) {
    rsort($array);
    foreach ($array as $array) {
        echo $array;
    };
}
// arrayReverse($array1);

?>

<?php
// 44 
// 次のソースコードの関数内を埋めて、2と表示されるソースコードを作成しなさい
// 元の処理の改変は行わないこと

    $number = 1;
    function add_number()
    {
        global $number;
        $number++;
        // return $number; // 不要？
    }
    add_number();
    echo $number;
    
?>