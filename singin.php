<?php
include_once(__DIR__ . '/model/functions.php');


//$_POST通信が発生した時
if($_POST){
   
    //$user として　userSystem　クラスをインスタンスする。
    $user = new userSystem();


    //　Emailで既存ユーザがいるかをチェック
    //　$user->userEmailCheck()
    if($user->userEmailCheck($_POST['userEmail'])){
        //存在する場合
        $error[] = '登録済みです';
    }else{
        //存在しない場合　登録処理
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $password = $_POST['userPassword'];
        //すべての値が空でないときDBに登録
        if(
            $userName !== ''
            &&
            $userEmail !== ''
            &&
            $password !== ''
        ){
            $user->setUser($userName,$userEmail,$password);
        }else{
            $error[] = '入力値に問題があります';  
        }
    }
}
include_once(__DIR__ . '/view/sing-view.php');