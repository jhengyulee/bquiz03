<!-- 這邊再想一下 -->
<div style="height: 300px;">
<div class="ct">預告片清單</div>
<div class="" style="width:100%; display:flex; justify-content:space-between;">

<div style="width:24.5%; text-align:center; background:#eee">預告片海報</div>
<div style="width:24.5%; text-align:center; background:#eee">預告片片名</div>
<div style="width:24.5%; text-align:center; background:#eee">預告片排序</div>
<div style="width:24.5%; text-align:center; background:#eee">操作</div>
    
</div>
<form action="./api/edit_poster.php" method="post">
<div style="width:100%; height:210px; overflow:auto">
<?php
$rows=$Poster->all(" order by rank");
foreach($rows as $key => $row){
    $prev=(isset($rows[$key-1]))?$rows[$key-1]['id']:$row['id'];//好難  看不懂  判斷是否有上下一筆資料( rows[] vs row[] )
    $next=(isset($rows[$key+1]))?$rows[$key+1]['id']:$row['id'];
?>
<div style="width:100%; display:flex; justify-content:space-between;margin:2px 2px">
    <div style="width:24.6%" class="ct">
        <img src="./upload/<?=$row['img'];?>" style="height:70px;">
    </div>
    <div style="width:24.6%" class="ct">
        <input type="text" name="name[]" value="<?=$row['name'];?>"></div>
    <div style="width:24.6%" class="ct">
        <button class="btn" type="button" data-id="<?=$row['id']."-".$prev;?>">往上</button>   <!--加上data-id 以便作向上向下排序交換-->
        <button class="btn" type="button" data-id="<?=$row['id']."-".$next;?>">往下</button>
    </div>
    <div style="width:24.6%" class="ct">
        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$row['sh']==1?'checked':'';?>>顯示
        <input type="checkbox" name="del[]" value="<?=$row['id'];?>"> 刪除
        <select name="ani[]"> <!--為何name[]要設為陣列? -->
            <option value="1" <?=$row['ani']==1?'selected':'';?>>淡入淡出</option>
            <option value="2" <?=$row['ani']==2?'selected':'';?>>滑入滑出</option>
            <option value="3" <?=$row['ani']==3?'selected':'';?>>縮放</option>
        </select>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>"> <!--送到後台-->
    </div>
</div>
<?php    
}

?>   

</div>
<div class="ct" style="width: 95%;">
    <input type="submit" value="編輯確定"> 
   <input type="reset" value="重置" > 
</div>
</form>


</div>

<!-- ajax -->
<script>

$(".btn").on("click",function(){   //點擊向上向下按鈕
    let id=$(this).data('id').split("-")//將資料用-切開 
    // console.log(id);
    $.post("./api/switch.php",{table:'poster',id},()=>{
        location.reload(); //將畫面重整
    })

})



</script>




<hr>
<div style="height: 180px;">
<div class="ct">新增預告片海報</div>
<form action="./api/add_poster.php" method="post" enctype="multipart/form-data"> <!--檔案上傳要加enctype-->
    <table style="width:80%;margin:auto">
        <tr>
            <td>預告片海報:</td>
            <td><input type="file" name="img" id=""></td>
            <td>預告片片名:</td>
            <td><input type="text" name="name" id=""></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
</div>