<?php
$num = $_POST['num'];

// 半角に変換する
$num = mb_convert_kana($num, 'n');

// 数字以外が入力された場合
if (is_numeric($num) != true) {
    echo '数字を入力してください';
    exit;
}

$result = substr($num, mt_rand(0, strlen($num) - 1), 1);

echo date("Y/m/dの運勢は", time());
echo '<br>';
echo "選ばれた数字は$result";
echo '<br>';
if ($result == 0) {
    echo '凶';
} elseif ($result < 4) {
    echo '小吉';
} elseif ($result < 7) {
    echo '中吉';
} elseif ($result < 9) {
    echo '吉';
} else {
    echo '大吉';
}
?>

