<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="overflow:scroll;height: 430px;">
<?php
$rows=$Movie->all(" order by rank");
foreach($rows as $key => $row){


?>
    <div style="background:#eee;width:99%;height: 140px;margin:2px 0;display:flex">

        <div style="width: 15%;">
            <img src="./upload/<?=$row['poster'];?>" style="height:130px">
        </div>

        <div style="width: 15%;">
            分級：<img src="./icon/<?=$Level[$row['level']];?>" alt="">  <!-- 透過base.php的陣列挑選相對應圖片-->
        </div>

        <div style="width: 70%;">
            <div style="display:flex;">
                <div style="width: 33.3%;">片名：<?=$row['name'];?></div>
                <div style="width: 33.3%;">片長：<?=$row['length'];?></div>
                <div style="width: 33.3%;">上映時間：<?=$row['ondate'];?></div>
            </div>
            <div>
                <button>顯示</button>
                <button>隱藏</button>
                <button>往上</button>
                <button>往下</button>
                <button>刪除電影</button>
            </div>
            <div>
                劇情介紹：
            </div>
        </div>

    </div>
    <?php
    }
    ?>

</div>