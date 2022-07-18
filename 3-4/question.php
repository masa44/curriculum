<link rel="stylesheet" href="css/style.css">

<?php
//POST送信で送られてきた名前を受け取って変数を作成
$name = $_POST['name'];

//①画像を参考に問題文の選択肢の配列を作成してください。
$answerList1 = [80, 22, 20, 21];
$answerList2 = ['PHP', 'Python', 'JAVA', 'HTML'];
$answerList3 = ['join', 'select', 'insert', 'update'];

//② ①で作成した、配列から正解の選択肢の変数を作成してください
$correct1 = $answerList1[0];
$correct2 = $answerList2[3];
$correct3 = $answerList3[1];
?>

<p>お疲れ様です<?php echo $name; ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="post">

    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ($answerList1 as $value) { ?>
        <input type="radio" name="answer1" value="<?php echo $value; ?>"><?php echo $value; ?>
    <?php } ?>

    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ($answerList2 as $value) { ?>
        <input type="radio" name="answer2" value="<?php echo $value; ?>"><?php echo $value; ?>
    <?php } ?>

    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ($answerList3 as $value) { ?>
        <input type="radio" name="answer3" value="<?php echo $value; ?>"><?php echo $value; ?>
    <?php } ?>

    <br>

    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <input type="hidden" name="name" value="<?php echo$name; ?>" />
    <input type="hidden" name="correct1" value="<?php echo$correct1; ?>" />
    <input type="hidden" name="correct2" value="<?php echo$correct2; ?>" />
    <input type="hidden" name="correct3" value="<?php echo$correct3; ?>" />
    <input type="submit" value="回答する" />
</form>
