<?php
include_once "../base.php";
//複雜表單的處理  多個值多項目一起送來  要怎麼配對是重點
// if(isset($_POST['id'])){     假設一定都會有資料送過來,可以省略
    foreach($_POST['id'] as $key => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Poster->del($id);
        }else{
            $row=$Poster->find($id);
            $row['name']=$_POST['name'][$key];
            $row['ani']=$_POST['ani'][$key];
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        
            $Poster->save($row);
        }
    }


// }

to("../back.php?do=poster"); //資料從哪來就傳回哪裡

?>  
<!-- 沒HTML合寫可以不用加 ?> -->