<?php
require_once('validation/MenuValidation.php');
require_once('validation/IdValidation.php');
require_once('validation/importValidation.php');

// //90
// Q.商品マスター登録プログラムを作成したい
// 下記仕様をみたすプログラムを作成してください。
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

    // 変更 インポート機能の追加
    const SHOW = "1";
    const REGIST = "2";
    const DELETE = "3";
    const EXPORT = "4";
    const IMPORT = "5";
    const END = "0";

    const CHOICE = "1:商品一覧  2:商品登録  3:商品削除  4:CSV出力　5:CSV取込　0:終了" . PHP_EOL;
    const INPUTEXISTS = ["1", "2", "3", "4", "5", "0"];

    public function start() {
        // Menu用バリデーションをインスタンス化
        $menuvalid = new MenuValidation();

        echo "実行する処理を選択してください" . PHP_EOL;
        echo self::CHOICE;
        $input = $this->input();

        // 入力値をチェック
        if ($menuvalid->check($input) === false) {
            echo $menuvalid->getErrorMessages("menu") . PHP_EOL;
            return $this->start();
        }

        switch ($input) {
            case self::END:
                echo "プログラムを終了します" . PHP_EOL;
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

            case self::EXPORT;
                $this->exportCsv();
                break;

            case self::IMPORT;
                $this->importCsv();
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

        $input = new Item($input);
    }

    // 商品削除の処理
    public function delete() {
        // Menu用バリデーションをインスタンス化
        $idvalid = new IdValidation();

        echo "削除する商品のIDを 数字3桁 で入力してください" . PHP_EOL;
        $input = trim(fgets(STDIN));

        // id入力値チェック
        if ($idvalid->check($input) === false) {
            echo $idvalid->getErrorMessages("id") . PHP_EOL;
            return $this->start();
        }

        unset(Item::$itemList[$input]);
    }

    // 変更 メソッド名をわかりやすいように変更
    public function exportCsv() {
        date_default_timezone_set('Japan');
        $today = date("YmdHis");

        $directory = "./csv/";
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $file = sprintf("%sitem_list_%s.csv", $directory, $today);

        $header = "ID,商品名,JANコード";
        $encode = mb_convert_encoding($header, "SJIS-win", "UTF-8");

        $fp = fopen($file, "a");
        fwrite($fp, $encode . PHP_EOL);
        foreach (Item::$itemList as $key => $value) {
            fwrite($fp, sprintf("%s,%s,%s", $key, $value["name"], $value["code"]) . PHP_EOL);
        }
        fclose($fp);
    }

    // 変更 インポート機能の追加
    public function importCsv() {
        $file = "./import/*.csv";

        if (!glob($file)) {
            echo "csv形式のファイルが存在しません" . PHP_EOL;
            return;
        }

        $importfiles = glob($file); // ディレクトリ内の.csv形式のファイル名を全て配列に格納

        foreach ($importfiles as $importfile) {
            $importValid = new ImportValidation();

            $fp = fopen($importfile, "r");
    
            // ラベルの取り出し 文字エンコードとtrim()を添えて
            $label = fgets($fp);
            $encodeLabel = mb_convert_encoding(trim($label), "UTF-8", "SHift-JIS");

            // labelの形式チェック
            if ($importValid->check($encodeLabel) === false) {
                echo $importValid->getErrorMessages("import") . PHP_EOL;
                return $this->start();
            }

            while ($row = fgets($fp)) {
                $itemData = explode(",", $row);
    
                $newItem = new Item($itemData[0]); //$itemData[0]は商品名
    
                // JANコードをランダム値から取込データへ書き換え
                $newItem->setCode(trim($itemData[1])); //$itemData[1]はJANコード
            }

            fclose($fp);
        }
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

        $this->code = sprintf("%09d%03s", rand(0,999999999), $this->id);

        self::$itemList[$this->id]["name"] = $this->name;
        self::$itemList[$this->id]["code"] = $this->code;
        
        self::$count++;
    }

    // 変更 セッター追加 $itemListも更新
    public function setCode($code) {
        $this->code = $code;
        self::$itemList[$this->id]["code"] = $this->code . $this->id;
    }
}


$start =new Start();
echo $start->start();

?>