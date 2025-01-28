<?php
include_once(__DIR__ . '/model/functions.php');


//$_POST通信が発生した時
if($_POST){

    //$user として　userSystem　クラスをインスタンスする。
    $user = new userSystem();

    //Emailで存在確認
    //$user->userEmailCheck
    if( $user->userEmailCheck($_POST['userEmail']) ){
        // 存在している　ログイン可
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $password = $_POST['userPassword'];
       
        //パスワードとユーザ名があっているか確認
        $result = $user->login($userName,$userEmail,$password);
        if( is_null($result) ){
            //存在しない　→　ユーザ名、メールアドレスが違っています
            $error[] = 'ユーザ名、メールアドレスが違っています';
        }else{
            //存在する
            //セッションに保存

            //TOPに遷移
            header("Location: {$const(DIR)}");
            exit();
        }
    }else{
        //存在していない　エラー
        $error[] = '登録がありません';
    }    
}


include_once(__DIR__ . '/view/login-view.php');