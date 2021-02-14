<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_5</title>
</head>
<body>
    <form action="" method="post">
        <p>名前<input type="txt" name="namein"></p>
        <p>コメント<input type="txt" name="commentin"></p>
        <input type="submit" name="submit" value="送信">
    </form>

<?php

        //送信フォームに入力されたとき以下の処理を行う
        if(!empty($_POST["namein"]) && !empty($_POST["commentin"])){
        //変数に受け取った文字列を代入
            $namein = $_POST["namein"];
            $commentin = $_POST["commentin"];



	    // DB接続設定
	        $dsn = 'データベース名';
	        $user = 'ユーザー名';
	        $password = 'パスワード';
	        $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	
	     //記入例；以下はPHP領域に記載すること。
	     //4-1で書いた「// DB接続設定」のコードの下に続けて記載する。
	        $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
	        $sql -> bindParam(':name', $name, PDO::PARAM_STR);
	        $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
	        $name = $namein;
	        $comment = $commentin; 
	        $sql -> execute();

	      //bindParamの引数名（:name など）はテーブルのカラム名に併せるとミスが少なくなります。最適なものを適宜決めよう。
        }
	
?>
</body>
</html>