<?php

// 45
// 1,2,3,4 ... 10と出力できるように関数内を埋めてください
// 元の処理の書き換えは行わず// 内に処理を書いていくこと
    function count_up()
        {
            static $number = 0;
            $number++;
            return $number;
        }

    for($i = 0; $i < 10; $i ++)
        {
            echo count_up(). PHP_EOL;
        }

?>

<?php

// 46 外部ファイル
// "Hello World"と出力するファイルを作成してください。
// index.phpというファイルを作成し、先ほど作成したファイルを読み込んで、出力してください。

// 別途添付


// 47
// phpinfo関数を使用し、PHPの情報を確認してください。

// phpinfo();  // 〇確認しました。


// 48
// 日時の関数を利用し、
// 現在時間のUNIX タイムスタンプを表示しなさい。
// 2017/08/04 13:44:41だと、次のように表示される
// 1501821881
echo time() . PHP_EOL;


// 49
// 年月日 時:分:秒で表示しなさい
// ex) 2017/8/4 13:44:41
echo date('Y/n/j G:i:s', time()) . PHP_EOL;


// 50
// 2017-01-01 00:00:00をUNIX タイムスタンプ形式に変更しなさい
echo strtotime('2017-01-01 00:00:00') . PHP_EOL;


// 51
// 次の変数を宣言しなさい
// $array = array("g", "M", "g" ,"r", "g", "g" ".", "b", "g", "e", "g", "a", "g", "n");
// ループで文字連結しなさい。
// 文字がgの場合は、処理をスキップさせること。
$array = array("g", "M", "g" ,"r", "g", "g", ".", "b", "g", "e", "g", "a", "g", "n");
$words = '';

foreach ($array as $word) {
    if ($word === 'g') {
        continue;
    }
    $words .= $word;
}

echo $words;

?>