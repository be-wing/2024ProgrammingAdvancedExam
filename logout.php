<?php
//modelの読み込み
include_once(__DIR__ . '/model/functions.php');

//セッション情報を空にする
$_SESSION = []; 

//userSystem()　を　インスタンスする
$user = new userSystem();
//ログアウトの処理　logout()
$user->logout();


//TOPに遷移
header("Location: {$const(DIR)}");
exit();