<?php
require_once('index.php');  // Atm::INPUTEXISTSを使用する為の読み込み

class MenuValidation {
    // 変更 エラーメッセージを変数に配列で格納
    private static $error = [
        'menu' => '0～3の数字で入力してください。',
        'money' => '金額は 0 以上の整数で入力してください。'
    ];

    // 処理選択の入力値をチェックするクラスメソッド
    public static function check($input) {
        if (array_key_exists($input, Atm::INPUTEXISTS)) {
            return true;
        }
        
        return false;
    }

    public static function getErrorMessages($errorType) {
        return self::$error[$errorType];
    }
}

?>