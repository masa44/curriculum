<?php
// index.php

$fruits = [	// item, price, num
	'りんご'=>[100, 3],
	'みかん'=>[50, 3],
	'もも'=>[300, 10]
];

function calc($price, $num) {
	return $price * $num;
}

foreach ($fruits as $key=>$value) {
	echo $key . 'は' . calc($value[0], $value[1]) . '円です。' . "<br>";
}

?>
