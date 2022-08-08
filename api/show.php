<!-- rank作交換 很難 要多練習-->  

<?php
include_once "../base.php";

$row=$Movie->find($_POST['id']);

//一般寫法
// if($row['sh']==1){
//     $row['sh']=0;
// }else{
//     $row['sh']=1;
// }

//三元運算式
// $row['sh']=($row['sh']==1)?0:1;
$row['sh']=($row['sh']+1)%2;// 0->1  1->0  操作大量程式碼時比上述很快
$Movie->save($row);
?>