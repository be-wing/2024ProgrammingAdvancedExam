<?php
include_once(__DIR__ . '/model/functions.php');

//ログインチェック
if( !isset($_SESSION['userKey']) ){
    header("Location: {$const(DIR)}"); //TOPに遷移
    exit();
}

//初期表示 GET
if( isset($_GET['id']) ){
    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    $sql = 'SELECT * FROM `posts` WHERE `id`= :id AND `user_key` = :user_key';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->bindValue(':user_key', $_SESSION['userKey']);
    //クエリの実行
    $stmt->execute();
    //実行結果を取得
    $data = $stmt->fetch();
}


//更新処理 POST
if($_POST){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $update_date = date('Y-m-d H:i:s');

    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    $sql = '
    UPDATE `posts`
    SET
        `title`=:title,
        `body`=:body,
        `update_date`=:update_date
    WHERE
        `id`=:id
        AND
        `user_key`=:user_key
    ';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':body', $body);
    $stmt->bindValue(':update_date', $update_date);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->bindValue(':user_key', $_SESSION['userKey']);
    //クエリの実行
    $result = $stmt->execute();
    $key=$_GET['key'];


    if($result){
        header("Location: {$const(DIR)}blog.php?key={$key}"); //blogに遷移
        exit();  
    }
}


include_once(__DIR__ . '/view/update-view.php');