<?php

// 52
// 連想配列を宣言しなさい
// first_name : joe
// last_name : jonathan
// age : 12
$person = [
    'first_name' => 'joe',
    'last_name' => 'jonathan',
    'age' => 12
];


// 53
// 52の連想配列を使用し、次のように出力しなさい
// name : joe jonathan
// age : 12

echo 'name : ' . $person['first_name'] . ' ' . $person['last_name'] . PHP_EOL;
echo 'age : ' . $person['age'] . PHP_EOL;


// 54
// 53の続き、
// 連想配列の中身を追加し、表示しなさい
// favorite => spiderman
// 追加した配列は次のように表示される
// name : joe jonathan
// age : 12
// favorite : spiderman
$person['favorite'] = 'spiderman';

echo 'name : ' . $person['first_name'] . ' ' . $person['last_name'] . PHP_EOL;
echo 'age : ' . $person['age'] . PHP_EOL;
echo 'favorite : ' . $person['favorite'] . PHP_EOL;


// 55
// 54の続き、
// ageとfavoriteの中身を次のように書き換え,表示しなさい
// age => 23
// favorite => music
$person['age'] = 23;
$person['favorite'] = 'music';

// $displayAgeと$displayFavoriteでは書き換え内容が更新されなかったので回避
echo 'age : ' . $person['age'] . PHP_EOL;
echo 'favorite : ' . $person['favorite'];


// 56
// 55の続き、
// 54の連想配列を多次元連想配列としなさい。
// 次の情報で配列追加すること
// first_name => kelly
// last_name => clarkson
// age => 35
// favorite => singing
$persons = [
    [
        'first_name' => 'joe',
        'last_name' => 'jonathan',
        'age' => 23,
        'favorite' => 'music'
    ],
    [
        'first_name' => 'kelly',
        'last_name' => 'clarkson',
        'age' => 25,
        'favorite' => 'singing'
    ]
    ];


// 57
// 56の続き
// foreach文、for文を使って多次元配列を出力しなさい
// ex)
// 1人目
// name : joe jonathan
// age : 23
// favorite : music
// 2人目
// name : kelly clarkson
// age : 35
// favorite : singing
foreach ($persons as $person) {
    echo 'name : '. $person['first_name'] . ' '. $person['last_name']. PHP_EOL;
    echo 'age : ' . $person['age'] . PHP_EOL;
    echo 'favorite : ' . $person['favorite'] . PHP_EOL;
}

for ($i = 0; $i < count($persons); $i++) {
    echo 'name : '. $persons[$i]['first_name'] . ' '. $persons[$i]['last_name']. PHP_EOL;
    echo 'age : ' . $persons[$i]['age'] . PHP_EOL;
    echo 'favorite : ' . $persons[$i]['favorite'] . PHP_EOL;
}


// 58
// Memberというクラスを作成しなさい。
// 名前というmember変数を持つことができる。
// registというメソッドで名前を設定し、
// showというメソッドでセットされた名前を出力する機能を作りなさい。
// 出力例 山田太郎さんです。
// Memberクラスのインスタンスを生成し、registメソッドで名前設定後、
// showメソッドで名前を出力しなさい。
class Member {
    public $name;
    function regist($name){
        $this->name = $name;
    }
    function show(){
        echo $this->name . 'さんです。' . PHP_EOL;
    }
}

$yamada = new Member;
$yamada->regist('山田太郎');
$yamada->show();


// 59
// 58の続き、
// Memberクラスを改修する
// Memberというクラスは名前と年齢を持つ事ができる。
// registというメソッドで名前と年齢を設定し、
// showというメソッドでセットされた名前と年齢を出力する機能を作れ
// 出力例　山田太郎さんは１１歳です。
// Memberクラスのインスタンスを生成し、registメソッドを使用し登録。
// その後showメソッドを使用して出力しなさい。
class Member2 {
    public $name;
    public $age;
    function regist($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
    function show(){
        echo $this->name . 'さんは' . $this->age . '歳です。' . PHP_EOL;
    }
}

$yamada = new Member2;
$yamada->regist('山田太郎', '１１');
$yamada->show();


// 60
// 59の続き、
// Memberクラスを改修する
// Memberというクラスは名前と年齢を持つ事ができる。
// setNameというメソッドで名前を設定する。
// setAgeというメソッドで年齢を設定する。
// showというメソッドでセットされた名前を出力する機能を作成しなさい。
// 出力例　山田太郎さんは１１歳です。
class Member3 {
    public $name;
    public $age;
    function setName($name){
        $this->name = $name;
    }
    function setAge($age){
        $this->age = $age;
    }
    function show(){
        echo $this->name . 'さんは' . $this->age . '歳です。' . PHP_EOL;
    }
}

$yamada = new Member3;
$yamada->setName('山田太郎');
$yamada->setAge('１１');
$yamada->show();


// 61
// 60の続き、
// 3人の情報を持ちたい
// Memberクラスの配列を作りなさい。
// それぞれの名前、年齢はは適当に入力すること
$persons = [
    ['name' => '山田', 'age' => '１１'],
    ['name' => '田中', 'age' => '２２'],
    ['name' => '中村', 'age' => '３３']
];

// 62
// 61の続き、
// 名前と年齢をコンストラクターで登録するMemberクラスを作成し、インスタンス生成しなさい。
// showメソッドで出力結果を確認すること
class Member4 {
    public $name;
    public $age;
    function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
    function show(){
        echo $this->name . 'さんは' . $this->age . '歳です。' . PHP_EOL;
    }
}

for ($i = 0; $i < count($persons); $i++) {
    $person[$i] = new Member4($persons[$i]['name'], $persons[$i]['age']);
}

for ($i = 0; $i < count($persons); $i++) {
    $person[$i]->show();
}

?>

<?php
// 63
// 次のクラスをカプセル化し、$languageはアクセサメソッドからのみ、代入・参照できる様に修正しなさい
  class HumanBase {
    private $human_count;
    private $language = "Japanese";
    public function setLanguage($language) {
        $this->language = $language;
    }
    public function getLanguage() {
        return $this->language;
    }
  }

  $human_base = new HumanBase();

  // 代入・参照の確認
  echo $human_base->getLanguage() . PHP_EOL;
  $human_base->setLanguage('English');
  echo $human_base->getLanguage() . PHP_EOL;

?>