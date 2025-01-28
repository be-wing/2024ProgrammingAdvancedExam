<?php
include_once(__DIR__ . '/model/functions.php');

try{
    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    $sql = 'SELECT * FROM `category`';
    $stmt = $dbh->prepare($sql);
    //クエリの実行
    $stmt->execute();
    //実行結果を取得
    $data = $stmt->fetchAll();
} catch (Exception $e) {
    var_dump( $e->getMessage() );
}
include_once(__DIR__ . '/view/index-view.php');