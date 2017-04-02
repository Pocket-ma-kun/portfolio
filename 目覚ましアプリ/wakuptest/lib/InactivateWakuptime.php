<?php
//起床時刻解除API

//APIへの入力は？
//ユーザを特定するためのid？

//APIでの処理は？
//MorningcallActivateのInActivate。

//APIからの出力は？
//なし

	//仮にスマホから受信するデータを以下とする。
	$json = '[{
    "id": "1"
	}]';

	//debug用
	ini_set('display_errors',1);
	
	//あれ？スマホ側で保存しておけるデータって何があるの？笑
	//というかスマホ側では
	//クッキーが有効ならば、クッキーでいいけども。。。
	//クッキーが無効になっているならば？
	//何を元に判断すればいいのか？
	//FBやっていればFBからログインできるけど、
	//FBやっていない、かつ、クッキーが切れたときはどうする？
	
	//スマホから取得したjson形式のデータをデコードして,連想配列に代入。
	$array = json_decode($json, true);
	
	//連想配列から値だけ抽出。
	foreach($array as $value){
	$id = $value['id'];
	}
		
	//dbに接続。
	$connect = mysqli_connect('localhost','hogehoge','123314','test');
		
	//たぶんここは大規模になると変更必要だろうね。
	//全部持ってきていたら時間食うはず。
	//testというテーブル名は後で正式名称に書き換え
	//大規模サービスにするなら後々where文もidで線形探索でなく、2分岐で探索したほうが早いね.
	//hogehogeは書き換えないと。
	//本当はMornigncallTimeとidに配列から参照させよう。
 	$result1 = mysqli_query($connect,'update member set MorningcallActivate = false where id = "'.$id.'"');
 	 	
 	//db接続を終了。
 	mysqli_close($connect);
?>