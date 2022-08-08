<!-- rank作交換 很難 要多練習-->  

<?php
include_once "../base.php";

$table=$_POST['table'];
$DB=new DB($table);
$DB->del($_POST['id']); 

?>