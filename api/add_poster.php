<?php
include_once "../base.php";

//上傳圖片判斷式
if(isset($_FILES['img']['tmp_name'])){
    $poster['img']=$_FILES['img']['name'];//name vs tmp_name
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);  //dont know
}
$poster['name']=$_POST['name'];
$poster['sh']=1;//顯示為1
$poster['ani']=rand(1,3);//rand()函式 1~3隨機產生
$poster['rank']=$Poster->math('max','id')+1;

$Poster->save($poster);
to("../back.php?do=poster");
?>