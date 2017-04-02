<?php
	// commonファイル読み込み
    require_once '../../lib/facebook/lib/common.php';
    // facebookAPIのコアファイル読み込み
    require_once '../../lib/facebook/lib/facebook.php';

    // facebookAPIの処理開始
    $facebook = new Facebook(
                array(
                    'appId' => appId, 
                    'secret' => appPassword
                    )
            );  
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HTML5サンプル</title>
</head>
    <body>
        <a href="<?php echo $facebook->getLoginUrl($getFacebookUserStatusArray);?>">Facebook</a>
    </body>
</html>

