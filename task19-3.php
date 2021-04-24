<?php

class User {
    public $user_list = array(
        1 => array(
            "id" => "1",
            "password" => "1234",
            "name" => "tanaka",
            "balance" => "500000"
        ),
        2 => array(
            "id" => "2",
            "password" => "3456",
            "name" => "suzuki",
            "balance" => "1000000"
        )
    ); 
}

class Atm {
    
    // 処理の選択肢をクラス定数で宣言
    const SHOW = '1';
    const RECEIVE = '2';
    const DEPOSIT = '3';
    const END = '0';
    
    // 処理の選択肢を表示するクラス定数
    const CHOICE = '1:残高照会  2:入金処理  3:出金処理  0:終了する' . PHP_EOL;
    
    // 入力値をチェックする為の配列をクラス定数で宣言
    const INPUTEXISTS = ['1', '2', '3', '0'];
    
    
    // 口座残高を$creditとしてprivateで宣言　初期値100,000円
    private $credit = 100000;
    
    // 変更 追加
    public $user;
    
    // 変更  コンストラクタ追加
    public function __construct() {
        //ログイン
        $this->login();
    }

    // 変更 ログイン処理のメソッド追加
    public function login() {
        //id入力
        echo 'ログインIDを入力してください' . PHP_EOL;
        $input = trim(fgets(STDIN));
        
        //Userクラスのユーザーリストにidがあるかチェック
        $users = new User();
        if (!array_key_exists($input, $users->user_list)) {
            //なければエラー、再帰関数
            echo 'ログインIDが存在しません' . PHP_EOL;
            return $this->login();
        }

        //Userクラスから指定されたユーザー取得
        $userData = $users->user_list[$input];
        //パスワード取得
        $userPassword = $userData['password'];
        echo 'ログインパスワードを入力してください' . PHP_EOL;
        $input = trim(fgets(STDIN));

        //取得したユーザーのパスワードと入力値が一致するかチェック
        if ($input !== $userPassword) {
            //なければエラー、再帰関数
            echo 'ログインパスワードが存在しません' . PHP_EOL;
            return $this->login();
        }

        //問題なければ、プロパティの$userにセット
        $this->user = $userData;
    }

    // 処理を実行する関数
    public function start() {
        echo '実行する処理を選択してください。' . PHP_EOL;
        echo self::CHOICE;
    
        $input = $this->input();
    
        // 入力値をチェック
        if ($this->checkChoice($input) === false) {
            $this->start();
        }
        
        // 入力値別に処理を分岐
        if ($input === self::SHOW) {
            $this->showCredit();
        }
    
        if ($input === self::RECEIVE) {
            $this->receiveMoney();
        }
    
        if ($input === self::DEPOSIT) {
            $this->depositMoney();
        }
    
        if ($input === self::END) {
            echo 'プログラムを終了します。' . PHP_EOL;
            return;
        }
    
        // 続けて処理を選択 変更 再帰処理を start() 内へ移動
        return $this->start();
    }
    
    // 標準入力
    public function input() {
        $input = trim(fgets(STDIN));
        
        return $input;
    }

    // 処理選択の入力値をチェックする関数
    public function checkChoice($input) {
        if (array_key_exists($input, self::INPUTEXISTS)) {
            return true;
        }
        
        echo '0～3の数字で入力してください。' . PHP_EOL;
        return false;
    }
    
    // 入出金の金額入力値をチェックする関数
    public function checkMoney($money) {
        if (strcmp($money, intval($money)) !== 0) {
            echo '金額は 0 以上の整数で入力してください。' . PHP_EOL;
            return false;
        }
        
        return true;
    }
        
    // 口座残高を出力する関数
    public function showCredit() {
        echo 'あなたの口座残高は ' . $this->credit . ' 円です。' . PHP_EOL;
    }
    
    // 入金処理の関数
    public function receiveMoney() {
        echo '入金金額を入力してください。' . PHP_EOL;
    
        $money = $this->input();
        if ($this->checkMoney($money) === false) {
            // バリデーションfalseの時の処理
            return $this->receiveMoney();
        }
    
        $this->credit += intval($money);
        echo $money  . ' 円を入金しました。' . PHP_EOL;
    }
    
    // 出金処理の関数
    public function depositMoney() {
        echo '出金金額を入力してください。' . PHP_EOL;
    
        $money = $this->input();
        if ($this->checkMoney($money) === false) {
            // バリデーションfalseの時の処理
            return $this->depositMoney();
        }
    
        // 金額がマイナスになる時の処理
        if ($this->credit - intval($money) < 0) {
            echo '残高が不足している為、処理を中止しました。' . PHP_EOL;
            return $this->start();
        }
        
        $this->credit -= intval($money);;
        echo $money  . ' 円を出金しました。' . PHP_EOL;
    }
}


$atm = new Atm();
$atm->start();

?>