<?php
//個人情報設定API

//入力
//id,name,
//など
//仮にidとnameだけにしておく。

//処理
//idやname
//などあるレコードの更新update

//出力
//idやname
//など更新した後の個人レコード

	//仮にスマホから受信するデータを以下とする。
	$json = '[{
    "id": "2",
    "name": "masa"
	}]';

	//debug用
	ini_set('display_errors',1);
		
	//スマホから取得したjson形式のデータをデコードして,連想配列に代入。
	$array = json_decode($json, true);
	
	//連想配列から値だけ抽出。
	foreach($array as $value){
	$id = $value['id'];
	$name = $value['name'];
	}
		
	//dbに接続。
	$connect = mysqli_connect('ec2-52-11-163-145.us-west-2.compute.amazonaws.com','wakup_admin','wakup2016','test');
		
	//ユーザのレコードを更新する。
	//暫定的に、nameのみを更新する。
 	$result1 = mysqli_query($connect,'update test.member set name = "'.$name.'" where id = "'.$id.'"');
 	 	
 	//db接続を終了。
 	mysqli_close($connect);
?>