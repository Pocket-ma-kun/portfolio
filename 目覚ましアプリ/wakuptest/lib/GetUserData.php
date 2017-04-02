<?php
//GetUserDataAPI
//アプリユーザが誰かを起こすときにデータ取得するAPI

//本来は多くのデータを返す必要があるけど
//ここでは仮にnameだけにしておく
//スマホからボタン押された信号みたいなの受け取る？

//エラーを出力。
ini_set('display_errors',1);

//DBにアクセスする
$connect = mysqli_connect("localhost","hogehoge","123314","test");

//もしデータベースが存在していなかったら？
// if(!$connect){
// 	echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
// }
// //もしデータベースが存在していたら？
// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($connect) . PHP_EOL;

//データベースに存在するユーザの中で、
//ハンドルネームと、画像と国、趣味
//データの条件は？
//モーニングコールがactivateであること
//できれば現在時刻から起こして欲しい時刻が近い人が昇順で並んでいるといいね
//20人くらいリスト渡しておいて、
//もっとほしい！とスマホから来たらもっかいやるか？
//どうやっているんだろうか？
//50人くらい保持しているけど
//20人くらいを見せていて、
//要求されたときに初めて残り30人を見せるんだろうか？

//DBのmemberテーブルから値を取得。
//ただし30件のみ
//値は？？？？？？？？？？？？？
//
//
//？？？？？？

$result = mysqli_query($connect,'select * from member where MorningcallActivate = true order by MorningcallTime limit 30');

//debug
//resultは連想配列じゃないよね？
//resultを連想配列hogeに入れ直してエンコードしないとだよね？
$totalrows = mysqli_num_rows($result);
$hoge = array();

	for($i=0; $i<$totalrows; $i++){
		$hoge[] = mysqli_fetch_array($result);
	}

	// foreach($hoge as $value){
	// 	echo $value['id'].' '.$value['name'].''.$value['MorningcallTime'].'<br />';
	// }

//連想配列hogeをjson形式にエンコードし、echoでスマホに送信。
echo json_encode($hoge);

//db接続を終了。
mysqli_close($connect);

?>