<?php

$name = "どんぶラッコ";

$message = "私の名前は";
$message .= $name;
$message .= "です";
echo $message;

$num = rand(1,2); // ランダムな数字を生成する

if( $num == 1 ) {
  echo "あたり";
} else {
  echo "はずれ";
}

?>