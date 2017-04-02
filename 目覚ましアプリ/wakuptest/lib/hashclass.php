<?php

//hashclass.php

//入力
//なし

//処理
//hash値のクラスを定義
//

//出力
//なし
ini_set('error', 1);

class hash{
//dohash関数


    const stretchCount = '1000';

	/**
     * ハッシュ化
     * 
     * @param string $string:文字列
     * @return string ハッシュ化された文字列
     */
    public function doHash($string){
        return hash('sha256', $string);
    }

/**
     * ログインハッシュの生成
     * 
     * @return string ハッシュ化された文字列
     */
    public function getLoginHash(){
        $timeStamp = time();
        $salt = $this->doHash($timeStamp);
        $hash = '';
        for($i=0; $i< self::stretchCount; $i++){
            $hash = $this->doHash($hash.$salt.$timeStamp);
        }
        return $hash;
    }
}

?>