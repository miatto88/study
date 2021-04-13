<?php
// 64
// 63の続き、
// HumanBaseクラスのインスタンスを生成した際にインスタンスの生成回数を追加し、
// インスタンスを生成した回数がわかる様にしなさい
// 回数はコンストラクタ内で行うようにし、
// インスタンスが生成された回数は、クラスの外から参照できるようにすること
// $human_countをクラス変数として書き換えることで実現できる
class HumanBase {
    private static $human_count;
    private $language = "Japanese";
    public function __construct() {
        self::$human_count++;
    }
    public static function getHumanCount() {
        return self::$human_count;
    }
    public function setLanguage($language) {
        $this->language = $language;
    }
    public function getLanguage() {
        return $this->language;
    }
}

$human_base = new HumanBase();
echo HumanBase::getHumanCount() . PHP_EOL;


// 65
// 64の続き、
// HumanBaseクラスを継承する、Humanクラスを作成しなさい
// 作成後、64で実行していたHumanBaseクラスのインスタンス生成で実行していた処理をHumanクラスに置き換えなさい
class Human extends HumanBase {
    private static $human_count;
    public function __construct() {
        self::$human_count++;
    }
    public static function getHumanCount() {
        return self::$human_count;
    }
}

$human_base = new Human();
echo Human::getHumanCount() . PHP_EOL;


// 66
// 65の続き、
// Humanクラスのインスタンス変数に$first_name, $last_name, $ageを追加し、アクセサメソッドも追加しなさい
// カプセル化を想定した記述方法とすること
// 実装後、2名分のインスタンス生成、データ設定、データ出力を実行すること
class Human2 extends HumanBase {
    private static $human_count;
    private $first_name;
    private $last_name;
    private $age;
    public function __construct() {
        self::$human_count++;
    }
    public static function getHumanCount() {
        return self::$human_count;
    }
    public function setProfile($first_name, $last_name, $age) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }
    public function getFirst_name() {
        return $this->first_name;
    }
    public function getLast_name() {
        return $this->last_name;
    }
    public function getAge() {
        return $this->age;
    }
}

$tanaka = new Human2();
$yamada = new Human2();
// echo Human2::getHumanCount() . PHP_EOL;

$tanaka->setProfile('ao', 'tanaka', 22);
$yamada->setProfile('taro', 'yamada', 33);

echo 'name : ' . $tanaka->getFirst_name() . " " . $tanaka->getLast_name() . PHP_EOL;
echo 'age : ' . $tanaka->getAge() . PHP_EOL;
echo 'name : ' . $yamada->getFirst_name() . " " . $yamada->getLast_name() . PHP_EOL;
echo 'age : ' . $yamada->getAge() . PHP_EOL;


// 67
// 66の続き、
// Humanクラスのメソッドに"$first_name-$last_name"の形式で値を取得できるgetFullNameメソッドを追加し、表示させなさい
class Human3 extends Human2 {
    public function getFullName() {
        return $this->getFirst_name() . '-' . $this->getLast_name();
    }
}

$tamura = new Human3();
$tamura->setProfile('hiroshi', 'miyata', 44);
echo $tamura->getFullName() . PHP_EOL;


// 68
// 67の続き、
// 仕様変更により、$middle_nameの考慮が必要になった
// Humanクラスに$middle_nameを追加し、必要な修正を加えなさい
// なお、フルネームの形式は"$first_name-$middle_name-$last_name"とするが、
// $middle_nameが無い場合は変更前の"$first_name-$last_name"の形式で出力する
// 実装後、生成している2名の内1名だけ$middle_nameを設定せよ

class Human4 extends Human3 {
    private $middle_name;
    public function setProfileWithmiddle($first_name, $last_name, $age, $middle_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
        $this->middle_name =  $middle_name;
    }
    public function getMiddle_name() {
        return $this->middle_name;
    }
    public function getFullName() {
        if (empty($this->getMiddle_name())) {
            return $this->first_name . '-' . $this->last_name;
        }
        return $this->first_name . '-' . $this->middle_name . '-' . $this->last_name;
    }
}

$tanahashi = new Human4();
$yamanaka = new Human4();

$tanahashi->setProfileWithmiddle('aiko', 'tanahashi', 55, 'chris');
$yamanaka->setProfileWithmiddle('taku', 'yamanaka', 66, '');

echo $tanahashi->getFullName() . PHP_EOL;
echo $yamanaka->getFullName() . PHP_EOL;

?>