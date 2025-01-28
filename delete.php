<?php
include_once(__DIR__ . '/model/functions.php');

//ログインチェック
if( !isset($_SESSION['userKey']) ){
    header("Location: {$const(DIR)}"); //TOPに遷移
    exit();
}

//GETに記事IDが存在して場合
if($_GET['id']){
    $id = $_GET['id'];
    $userKey = $_SESSION['userKey'];
    $key = $_GET['key'];


    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    $sql = '';
    $stmt = $dbh->prepare($sql);
    //バインド

   
    //クエリの実行
    $result = $stmt->execute();


    if($result){
        header("Location: {$const(DIR)}blog.php?key={$key}"); //TOPに遷移
        exit();   
    }


}else{
    header("Location: {$const(DIR)}"); //TOPに遷移
    exit();
}
