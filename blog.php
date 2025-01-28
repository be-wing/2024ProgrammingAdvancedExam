<?php
include_once(__DIR__ . '/model/functions.php');

//ログインチェック
if( !isset($_SESSION['userKey']) ){
    header("Location: {$const(DIR)}"); //TOPに遷移
    exit();
}


if( isset($_GET['key']) ){
    $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    $sql = '
    SELECT P.id , p.title , p.body , U.userName , U.userKey
    FROM `category` as C
    JOIN `posts` as P
    ON C.id = P.category_id
    JOIN `users` as U
    ON P.user_key = U.userKey
    WHERE
    C.category_key = :category_key;
    ';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':category_key', $_GET['key']);
    //クエリの実行
    $stmt->execute();
    //実行結果を取得
    $data = $stmt->fetchAll();
}else{
    header("Location: {$const(DIR)}"); //TOPに遷移
    exit();
}

//記事の投稿処理
if($_POST){
    $title = $_POST['title'];
    $body = $_POST['body'];
    if($title != '' && $body !=''){
        try{
            $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
            $sql= 'SELECT `id` FROM `category` WHERE `category_key` = :category_key';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':category_key', $_GET['key']);
            //クエリの実行
            $stmt->execute();
            $category_id = $stmt->fetch();


            $sql = '
            INSERT INTO `posts`
            (`title`, `body`, `user_key`, `category_id`)
            VALUES
            (:title,:body,:user_key,:category_id)';


            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':body', $body);
            $stmt->bindValue(':user_key', $_SESSION['userKey']);
            $stmt->bindValue(':category_id', $category_id["id"]);
            //クエリの実行
            $result = $stmt->execute();
            if( $result ){
                //登録したら現在のURLに遷移
                header("Location: {$_SERVER['REQUEST_URI']}");
                exit();
            }else{
                $error[] = '登録できませんでした。';
            }
        } catch (Exception $e) {
            var_dump( $e->getMessage() );
        }
    }else{
        $error[] = '入力項目に問題があります';
    }
}
include_once(__DIR__ . '/view/blog-view.php');