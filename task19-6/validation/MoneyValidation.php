<?php

// 変更 エラーメッセージ統合の為、extends
class MoneyValidation extends MenuValidation {
    // エラーメッセージを変数に格納
    // private static $error = '金額は 0 以上の整数で入力してください。';

    // 入出金の金額入力値をチェックするクラスメソッド
    public static function check($money) {
        if (strcmp($money, intval($money)) !== 0) {
            
            return false;
        }
        
        return true;
    }

    // public static function getErrorMessages() {
    //     return self::$error;
    // }
}

?>