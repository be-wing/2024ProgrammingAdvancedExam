<?php
include_once(__DIR__ . '/model/functions.php');

//ログインチェック
if( !isset($_SESSION['userKey']) ){
    header("Location: {$const(DIR)}"); //TOPに遷移
    exit();
}

if($_POST){
    $category = $_POST['category'];
    $date = date('Y/m/d H:i:s');

    if($category !== ''){
        $categorykey = $userKey =  hash( "sha256", $category . $date );//カテゴリーの認識に利用
        $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "";
        $stmt = $dbh->prepare($sql);
        //バインド


        //クエリの実行
        $result = $stmt->execute();
        if($result){
            //成功の場合
            header("Location: {$const(DIR)}"); //TOPに遷移
            exit();
        }else{
            $error[] = 'DBの登録に失敗しました';
        }
    }else{
        $error[] = 'カテゴリー名が正しくありません';
    }
}

include_once(__DIR__ . '/view/category-view.php');