<?php
//RegisterUserDataAPI
//新規ユーザ登録API

//入力
//name,gender
//など
//仮にnameとgenderだけにしておく。

//処理
//1:idやnameなどあるレコードの挿入insert into
//2:ログインハッシュ値のCookie化

//APIからの出力は？
//なし

   /**
     * ログインハッシュの生成
     * return string ハッシュ化された文字列
     */
    // public function getLoginHash(){
    //     $timeStamp = time();
    //     $salt = $this->doHash($timeStamp);
    //     $hash = '';
    //     for($i=0; $i<stretchCount; $i++){
    //         $hash = $this->doHash($hash.$salt.$timeStamp);
    //     }
    //     return $hash;
    // }
//別ファイルに宣言したものを呼び出し
   require_once 'hashclass.php';

//入力部分
    //仮にスマホから受信するデータを以下とする。
    //暫定的にnameだけにしておく
    //***************************************
    $json = '[{
    "name": "masakazu",
    "gender": "male"
    }]';

    //debug用
    ini_set('display_errors',1);
        
    //スマホから取得したjson形式のデータをデコードして,連想配列に代入。
    $array = json_decode($json, true);
    
    //連想配列から値だけ抽出。
    foreach($array as $value){
    $name = $value['name'];
    $gender = $value['gender'];
    }

 //処理部分

    //ハッシュ値の代入
    $hash = new hash();
    $Cookie = $hash->getLoginHash();
    //var_dump($Cookie);

    //dbに接続。
    $connect = mysqli_connect('localhost','hogehoge','123314','test');

    //hashテーブルにハッシュ値とのDB登録
    $result1 = mysqli_query($connect,'insert into login set hash = "'.$Cookie.'"');
    
    //ユーザのレコードを挿入する。
    //暫定的に、nameのみを挿入する。
    $result1 = mysqli_query($connect,'insert into test.member (name,gender) values("'.$name.'","'.$gender.'")');

    //ハッシュ値をCookieとしてブラウザへ登録 60sec*60min*24hours*7days
    setcookie("LoginHash",$Cookie,time()+60*60*24*7);

    //ハッシュの確認したい
    //echo $_COOKIE['LoginHash'];

    //db接続を終了。
    mysqli_close($connect);
?>