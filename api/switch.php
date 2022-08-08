<!-- rank作交換 很難 要多練習-->  

<?php
include_once "../base.php";

$table=$_POST['table'];
$ids=$_POST['id']; //不只一個id
$DB=new DB($table);
$row0=$DB->find($ids[0]);
$row1=$DB->find($ids[1]);

//rank作交換 start
//設定暫存變數
$rank=$row0['rank'];
$row0['rank']=$row1['rank'];
$row1['rank']=$rank;

$DB->save($row0);
$DB->save($row1);
?>