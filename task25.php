<?php

// Q.商品マスター登録プログラムを作成

// メインメニュー
// 1, 商品一覧表示
// 2, 商品登録
// 3, 商品削除
// 4, 商品CSV出力
// 5, 終了

// ↓各機能の詳細は下記

// 1, 商品一覧表示
// 【表示項目】
// id
// 商品名
// JANコード

// 2, 商品マスター登録
// ・商品名 - 入力
// ・JANコード生成(自動)
// ※JANコード生成ルールは、9桁のランダムな数字 + ID３桁とする
// ex) id = 1 のアイテムなら
// 9桁のランダムな数字 + 001

// 3, 商品削除
// idを入力し、該当する商品を一覧から削除

// 4, 商品CSV出力
// 現在登録されている商品一覧をCSVで出力する
// パス：./csv/item_list_{現在時刻YmdHis}.csv
// ・項目　
// ID, 商品名, JANコード

// 5, 終了


class Start {

    const SHOW = "1";
    const REGIST = "2";
    const DELETE = "3";
    const CSV = "4";
    const END = "5";

    const CHOICE = "1:商品一覧  2:商品登録  3:商品削除  4:CSV出力　5:終了" . PHP_EOL;

    public function start() {
        echo "実行する処理を選択してください。" . PHP_EOL;
        echo self::CHOICE;
        $input = $this->input();
        // valid

        switch ($input) {
            case self::END:
                echo 'プログラムを終了します。' . PHP_EOL;
                exit;

            case self::SHOW;
                $this->show() . PHP_EOL;
                break;

            case self::REGIST;
                $this->regist();
                break;

            case self::DELETE;
                $this->delete();
                break;

            case self::CSV;
                $this->csv();
                break;
        }

        // 処理が終わったら再帰
        return $this->start();
    }

    public function input() {
        $input = trim(fgets(STDIN));
        return $input;
    }

    // 商品一覧表示の処理
    public function show() {
        foreach (Item::$itemList as $key => $value) {
            echo "ID: " . $key;
            echo "　JANコード: " . $value["code"];
            echo "　商品名: " . $value["name"] . PHP_EOL;
        }
    }

    // 商品登録の処理
    public function regist() {
        echo "商品名を入力してください" . PHP_EOL;
        $input = trim(fgets(STDIN));
        // valid
        $input = new Item($input);
    }

    // 商品削除の処理
    public function delete() {
        echo "削除する商品のIDを 数字3桁 で入力してください" . PHP_EOL;
        $input = trim(fgets(STDIN));
        // valid
        unset(Item::$itemList[$input]);
    }

    public function csv() {
        date_default_timezone_set('Japan');
        $directory = "./csv/";
        $today = date("YmdHis");
        $file = sprintf("%sitem_list_%s.csv", $directory, $today);

        $fp = fopen($file, "a");
        fwrite($fp, "ID,name,JAN" . PHP_EOL);
        foreach (Item::$itemList as $key => $value) {
            fwrite($fp, sprintf("%s,%s,%s", $key, $value["name"], $value["code"]) . PHP_EOL);
        }
        fclose($fp);
    }
}


class Item {
    // IDをユニークなものにする為のカウント
    private static $count = 0;

    private $id;
    private $name;
    private $code;
    
    // id => [name, code] の連想配列に格納
    public static $itemList = [];

    public function __construct($input) {
        $this->id = sprintf("%03d", self::$count + 1);

        $this->name = $input;

        $this->code = sprintf("%09d%03s", rand(0,999999999),$this->id);

        self::$itemList[$this->id]["name"] = $this->name;
        self::$itemList[$this->id]["code"] = $this->code;
        
        self::$count++;
    }
}


$start =new Start();
echo $start->start();

?>