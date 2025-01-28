<?php
include_once(__DIR__ . '/model/functions.php');

//ログインチェック
if( !isset($_SESSION['userKey']) ){
    header("Location: {$const(DIR)}"); //TOPに遷移
    exit();
}

//記事の表示
if( isset($_GET['key']) ){

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
            
        } catch (Exception $e) {
            var_dump( $e->getMessage() );
        }
    }else{
        $error[] = '入力項目に問題があります';
    }
}
include_once(__DIR__ . '/view/blog-view.php');