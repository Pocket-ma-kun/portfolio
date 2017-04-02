<?php
/*
 * sign-up with facebook api
 */
// commonファイル読み込み
require_once '../../lib/facebook/lib/common.php';
// facebookAPIのコアファイル読み込み
require_once '../../lib/facebook/lib/facebook.php';
// hashclassの読み込み
require_once '../../lib/hashclass.php';

// facebookAPIの処理開始
$facebook = new Facebook(
            array(
                'appId' => appId, 
                'secret' => appPassword
                )
        );    

try{
    // get user status by facebook api
    $userStatus = $facebook->api('/me?fields=email,name', 'GET');
    
    // var_dump($userStatus);

    echo $userStatus['name'];
    echo '<br />';
    echo $userStatus['email'];
    echo '<br />';
    echo $userStatus['id'];

    // $userStatus['id']を基にDBを検索する
    $rows = mysqli_query($connect,'select * from member where facebookId = $userStatus["'.id.'"]');
    $judge = mysqli_num_rows($rows);

    if($judge < 0){
    // 初回登録
        mysqli_query($connect,'insert into member () values()');
    }
    //DB登録したら
    //Cookieの生成

    $hash = new hash();
    $Cookie = $hash->getLoginHash();

    
}catch(Exception $e){
    echo 'Error.';
}










