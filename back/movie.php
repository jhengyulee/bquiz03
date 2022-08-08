<!-- 好難好難 -->

<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="overflow:scroll;height: 430px;">
<?php
$rows=$Movie->all(" order by rank");
foreach($rows as $key => $row){
    $prev=(isset($rows[$key-1]))?$rows[$key-1]['id']:$row['id'];//看不懂多了解  判斷是否有上下一筆資料( rows[] vs row[] ) 有的話....沒有的話....
    $next=(isset($rows[$key+1]))?$rows[$key+1]['id']:$row['id'];

?>
    <div style="background:#eee;width:99%;height: 140px;margin:2px 0;display:flex">

        <div style="width: 15%;">
            <img src="./upload/<?=$row['poster'];?>" style="height:130px">
        </div>

        <div style="width: 15%;">
            分級：<img src="./icon/<?=$Level[$row['level']];?>">  <!-- 透過base.php的陣列挑選相對應圖片-->
        </div>

        <div style="width: 70%;">
            <div style="display:flex;">
                <div style="width: 33.3%;">片名：<?=$row['name'];?></div>
                <div style="width: 33.3%;">片長：<?=$row['length'];?>分鐘</div>
                <div style="width: 33.3%;">上映時間：<?=$row['ondate'];?></div>
            </div>
            <div>
                <button onclick="show(<?=$row['id'];?>)"><?=($row['sh']==1)?'顯示':'隱藏';?></button> <!---->
                <button onclick="sw('movie',[<?=$row['id'];?>,<?=$prev;?>])">往上</button> <!--switch-->
                <button onclick="sw('movie',[<?=$row['id'];?>,<?=$next;?>])">往下</button> <!--switch-->
                <button onclick="location.href='?do=edit_movie&id=<?=$row['id'];?>'">編輯電影</button> <!--時間不夠就放掉-->
                <button onclick="del('movie',<?=$row['id'];?>)">刪除電影</button> <!--到movie資料表 且id=...-->
            </div>
            <div>
                劇情介紹：<?=$row['intro'];?>
            </div>
        </div>

    </div>
    <?php
    }
    ?>

</div>

<script>
//往上往下
function sw(table,id){
    $.post("./api/switch.php",{table,id},()=>{
        location.reload();
    })
}
//刪除
function del(table,id){
    $.post("./api/del.php",{table,id},()=>{
        location.reload();
    })
}
// 顯示不顯示
function show(id){
    $.post("./api/show.php",{id},()=>{
        location.reload();
    })
}



</script>