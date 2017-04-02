<?php
//ActivateWakuptime.php
//起床時刻設定API

//APIへの入力は？
//スマホ側から送られてくるデータは？
//ユーザを特定するためのidと、更新したい時刻データ、MCのActivate。

//APIでの処理は？
//起床時刻Morningcalltimeの更新
//MorningcallActivateのtrue化、フラグ立てる。

//APIからの出力は？
//なし？

//本当は
//スマホからのJSON形式データをphpで処理できるようにデコード
//localサーバのみテストなので
//直接json変数にjson形式で代入している。

 // $json = json_decode($hoge,ture);
	
	// if(!$json){
	//  echo 'json error';
	// }
	// else{
	// echo $json;
	// }
	
	//debug用
	//ini_set('display_errors',1);

	//方法1
	//decodeした状態　連想配列の状態
	$json = '[{
    "id": "1",
    "MorningcallTime":"09:00:00"
	}]';
	
	//スマホから取得したjson形式のデータをデコードして,連想配列に代入。	
	$array = json_decode($json, true);
	
	//連想配列から値だけ抽出。
	foreach($array as $value){
	$id = $value['id'];
	$MorningcallTime = $value['MorningcallTime'];
	}
		
	//dbに接続。
	$connect = mysqli_connect('localhost','wakup_admin','wakup2016','test');
	//var_dump($connect);


		
	//たぶんここは大規模になると変更必要だろうね。
	//全部持ってきていたら時間食うはず。
	//testというテーブル名は後で正式名称に書き換え
	//大規模サービスにするなら後々where文もidで線形探索でなく、2分岐で探索したほうが早いね.
	//hogehogeは書き換えないと。
	//本当はMornigncallTimeとidに配列から参照させよう。
	echo 'update member set MorningcallTime = "'.$MorningcallTime.'" ,MorningcallActivate = true where id = "'.$id.'"';
 	$result1 = mysqli_query($connect,'update member set MorningcallTime = "'.$MorningcallTime.'" ,MorningcallActivate = true where id = "'.$id.'"');
 	
 	
 	//db接続を終了。
 	mysqli_close($connect);
?>