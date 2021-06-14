<?php

// //80
// 環境変数に従って、下記パスにcsvファイルを出力するようにしてください。
// もしディレクトリが存在しない場合は、再帰的に作成するような処理を書くこと。
// ｀｀｀./csv/{環境変数}/ファイル名｀｀｀
putenv("ENV=stg");
$env = getenv("ENV");

$directory = "./csv/$env/";

if (!file_exists($directory)) {
    mkdir($directory, 0777, true);
}

$fp = fopen($directory . "env.csv", "w");
fclose($fp);


// //81
// ｀｀｀http://localhost:1234｀｀｀
// こちらのURLにアクセスできるようなビルトインウェブサーバーのコマンドを書いてください。
exec("php -S localhost:1234");


// //82
// 下記パスのファイル名のみを取得し、出力してください。
// "/app/doc/test/sample/dev/test.php"
// 期待値
// test.php
$directory = "/app/doc/test/sample/dev/test.php";

echo dirname($directory) . PHP_EOL;


// //83
// 下記パスのディレクトリのパスのみを取得し、出力してください。
// "/app/doc/test/sample/dev/test.php"
// 期待値
// /app/doc/test/sample/dev
echo basename($directory) . PHP_EOL;


// //84
$array = array(
       "a" => 1,
       "b" => 2,
   );
// 上記の配列をjson化して出力してください。
// またjson化したものをデコードしてください。
$toJason = json_encode($array);
print_r($toJason);
echo PHP_EOL;

$toArray = json_decode($toJason, true);
print_r($toArray);
echo PHP_EOL;


// //85
// eyJtZXNzYWdlIjoiQ29uZ3JhdHVsYXRpb25zISJ9
// 上記は、base64でエンコードされた文字列です。
// base64でデコードし、さらにjsonをデコードされた内容をvar_dump()で出力してください。
$base64 = "eyJtZXNzYWdlIjoiQ29uZ3JhdHVsYXRpb25zISJ9";
$decode = base64_decode($base64);
var_dump($decode);


// //86
// "Hello World"をhash化して、出力してください。
$hash = password_hash("Hello World", PASSWORD_DEFAULT);
echo $hash;

?>