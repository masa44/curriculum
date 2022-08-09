<?php
require_once("getData.php");

$pdo = new getData();
$user_data = $pdo->getUserData();
$post_data = $pdo->getPostData();

function showPost($post_data) {

    $list = $post_data->fetchAll(PDO::FETCH_ASSOC);
    foreach ($list as $temp) {
        echo '<tr>';

        // id
        printf("<td>%s</td>", $temp['id']);

        // タイトル
        printf("<td>%s</td>", $temp['title']);

        // カテゴリ
        echo '<td>';
        switch($temp['category_no']) {
            case 1:
                echo '旅行';
                break;
            case 2:
                echo '食事';
                break;
            default:
                echo 'その他';
                break;
        }
        echo '</td>';

        // 本文
        printf("<td>%s</td>", $temp['comment']);

        // 投稿日
        printf("<td>%s</td>", $temp['created']);

        echo '</tr>';
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="1599315827_logo.png" class="headerLogo">
        </div>
        <div class="box0">
            <div class="wellcomeMessage">
                <?php
                printf("ようこそ %s%s さん", $user_data['last_name'], $user_data['first_name']);
                ?>
            </div>
            <div class="lastLogin">
                <?php
                printf("最終ログイン日：%s", $user_data['last_login']);
                ?>
            </div>
        </div>
    </div>
    <div class="main">
        <table>
            <tr>
                <th>記事ID</th> <th>タイトル</th> <th>カテゴリ</th> <th>本文</th> <th>投稿日</th> 
            </tr>
            <?php
            showPost($post_data);
            ?>
        </table>
    </div>
    <div class="footer">
        <p>Y&I group.inc</p>
    </div>
</body>
</html>
