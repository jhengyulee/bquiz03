<?php

include_once "../base.php";

$selectId=$_POST['id'];// .load()送過來的要用post 從front/order.php送來

$startDate=date("Y-m-d",strtotime("-2 days"));
$today=date("Y-m-d");

$movies=$Movie->all(" where `sh`='1' AND ondate between '$startDate' AND '$today'");

foreach($movies as $movie){
    $selected=($selectedId == $movie['id'])?'selected':'';
    echo "<option value='{$movie['id']}' $selected>{$movie['name']}</option>";
}

?>