
<?php
//UserCheckAPI
//
//入力
//スマホからのCookie

//処理
//スマホから受け取ったCoolie内のハッシュ値と
//DBサーバにあるハッシュ値を照合して
//その結果をスマホに返す
//

//出力
//正しく照合できれば1
//照合できなければハッシュ値を返す

    //debug用
    ini_set('display_errors',1);

//
//*************************************
// 取得したていで開発する
//*************************************

//スマホからjson形式でidとCookieを取得
	$json = '[{
    "id": "1",
    "Cookie": "000000"
	}]';

    //json形式のデータをデコードして,連想配列arrayに代入。   
    $array = json_decode($json, true);

    //連想配列から値だけ抽出。
    foreach($array as $value){
    $id = $value['id'];
    $Cookie = $value['Cookie'];
    }


//DBサーバのLoginテーブルから
//Cookieとしてハッシュ値を参照する

    //dbに接続。
    //引数:IP,mysql_username,password,dbname
    //$connect = mysqli_connect('ec2-52-11-163-145.us-west-2.compute.amazonaws.com','wakup_admin','wakup2016','test');
    $connect = mysqli_connect('localhost','hogehoge','123314','test');
    //debug
    //var_dump($connect);


    //db.loginテーブルからhashを取得
    $dbhash = mysqli_query($connect,'select hash from test.login where id = "'.$id.'" ');
    //var_dump($dbhash);


?>