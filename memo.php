<?php

// trim(fgets(STDIN)) で入力した値は文字列の為、
// 入力値チェックの際 is_int() や is_numeric() が使いにくいことがある。
// 今回は下記で対応できた。
// if (strcmp($money, intval($money)) !== 0) {


?>