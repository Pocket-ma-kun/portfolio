
<?php
//UserCheckAPI
//
//入力 
//スマホからのidとCookie

//処理
//スマホから受け取ったCoolie内のハッシュ値と
//DBサーバにあるハッシュ値を照合して
//その結果をスマホに返す
//

//出力 return
//正しく照合できれば1
//照合できなければ0を返す

    //debug用
    ini_set('display_errors',1);

//
//*************************************
// 取得したていで開発する
//*************************************

//スマホからjson形式でidとCookieを取得
    $json = '[{
    "id": "1",
    "Cookie": "10001"
    }]';

    //json形式のデータをデコードして,連想配列arrayに代入。   
    $array = json_decode($json, true);

    //連想配列から値だけ抽出。
    foreach($array as $value){
        $id = $value['id'];
        $Cookie = $value['Cookie'];
    }
    //var_dump($Cookie);

//DBサーバのLoginテーブルから
//Cookieとしてハッシュ値を参照する

    //dbに接続。
    //引数:IP,mysql_username,password,dbname
    //$connect = mysqli_connect('ec2-52-11-163-145.us-west-2.compute.amazonaws.com','wakup_admin','wakup2016','test');
    $connect = mysqli_connect('localhost','hogehoge','123314','test');
    //debug
    //var_dump($connect);


    //db.loginテーブルからhashを取得
    $result = mysqli_query($connect,'select * from test.login where id = "'.$id.'" ');
    $totalrows = mysqli_num_rows($result);
    
    //連想配列hogeにdbからのhashを代入
    $hoge = array();
    for($i = 0; $i < $totalrows; $i++){
        $hoge[] = mysqli_fetch_array($result);
    }

    //連想配列hogeから各値を出す。
    foreach($hoge as $value){
        //echo $value['id'].' '.$value['hash'].'<br />';
    }

    //Cookieの照合
    //照合できれば1をスマホに返す
    if($value['hash'] == $Cookie){
        $hogehoge = 1;
    }
    //照合できなければ0をスマホに返す
    else{
        $hogehoge = 0;
    }
    //var_dump($hogehoge);

    //変数hogehogeを連想配列に代入
    $encode = array("return" => "'.$hogehoge.'");

    //連想配列をjson_encodeする
    echo json_encode($encode);

    //db接続を終了。
    mysqli_close($connect);

?>