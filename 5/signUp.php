<?php
// db_connect.phpの読み込みFILL_IN
require_once("db_connect.php");

// 出力メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// POSTで送られていれば処理実行
if (isset($_POST["signUp"])) {
// nameとpassword両方送られてきたら処理実行
    if (empty($_POST["name"])) {  // user name 未入力
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) { // password 未入力
        $errorMessage = 'パスワードが未入力です。';
    } else {    // username と password の両方が入力されている
    // 入力したユーザIDとパスワードを格納
        $name = $_POST["name"];
        $password = $_POST["password"];

        // PDOのインスタンスを取得FILL_IN
        $pdo = db_connect();  
        try {
            //データベースアクセスの処理文章。ログイン名があるか判定
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }

        // 結果が1行取得できたら（ログイン名がある）
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // 既に使われている
            echo '既に使われています。';
        } else {
            // ログイン名がなかった時の処理
            // 新規ユーザー登録
            try {
                // SQL文の準備 FILL_IN 
                $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
                // パスワードをハッシュ化
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                // プリペアドステートメントの作成 FILL_IN 
                $stmt = $pdo->prepare($sql);
                // 値をセット FILL_IN
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':password', $password_hash);
                // 実行 FILL_IN
                $stmt->execute();                    
                // 登録完了メッセージ出力
                echo '登録が完了しました。';
            }catch (PDOException $e) {
                echo 'DB Error : ' . $e->getMessage();
                die();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h2>ユーザー登録画面</h2>
<div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
<div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>

<form method="POST" action="">
<input type="text" name="name" id="name" placeholder="ユーザー名" size="25"><br>
<input type="password" name="password" id="password" placeholder="パスワード" size="25"><br>
<input type="submit" value="新規登録" id="signUp" name="signUp"><br>
</form>
<a href="login.php">ログイン画面へ</a><br />
</body>
</html>