<!--  多練習 -->

<?php
include_once "../base.php";
$row=$Movie->find($_POST['id']);

if(!empty($_FILES['trailer']['tmp_name'])){ //要用empty
    $_POST['trailer']=$_FILES['trailer']['name'];
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../upload/'.$_FILES['trailer']['name']);
}else{
    $_POST['trailer']=$row['trailer']; //增加判斷處
}

if(!empty($_FILES['poster']['tmp_name'])){  //要用empty
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],'../upload/'.$_FILES['poster']['name']);
}else{
    $_POST['poster']=$row['poster']; //增加判斷處
}

//重新組合欄位已符合資料表欄位格式
$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
//刪掉原本未拼湊的欄位
unset($_POST['year'],$_POST['month'],$_POST['day']);
$_POST['sh']=$row['sh'];//增加判斷處
$_POST['rank']=$row['rank'];//增加判斷處
 

// dd($row);
// dd($_POST);


$Movie->save($_POST);

to('../back.php?do=movie');


?>