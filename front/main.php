<style>
  .lists{
    width: 210px;
    height: 280px;
    margin: auto;
    background: white;
  }

  .controls{
    width: 420px;
    height: 100px;
    background:white;
    margin:1rem auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
  }

  /* css畫三角形  作為按鈕用 */
  .right,.left{
    border-top:25px solid transparent ;
    border-bottom:25px solid transparent ;
    width: 0;
  }

  .right{
    border-left:30px solid #555 ;
    
  }

  .left{
    
    border-right:30px solid #bbb ;
  }

  .icons{
    width: 320px;
    background: yellow;
    height: 100%;
  }
</style>

<div class="half" style="vertical-align:top;">
        <h1>預告片介紹</h1>
        <div class="rb tab" style="width:95%;">
          <div>
            <div class="lists">

            </div>
            <div class="controls">
              <div class="left"></div>
              <div class="icons"></div>
              <div class="right"></div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="half">
        <h1>院線片清單</h1>
        <div class="rb tab" style="width:95%;display:flex;flex-wrap:wrap;justify-content:space-between">
        <?php 
        //呈現符合上映時間的電影及分頁
          $startDate=date("Y-m-d",strtotime("-2 days"));
          $today=date("Y-m-d");

          $all=$Movie->math("count","id"," where `sh`='1' AND ondate between '$startDate' AND '$today'");
          $div=4;
          $pages=ceil($all/$div);
          $now=$_GET['p']??1;
          $start=($now-1)*$div;
          $rows=$Movie->all(" where `sh`='1' AND ondate between '$startDate' AND '$today' order by rank limit $start,$div");
          
          foreach($rows as $row){
            
        ?>
        <div style="display:flex;flex-wrap:wrap;border:1px solid #ccc;border-radius:10px;width:49%;padding:5px">
            <div style="width:30%">
            <a href="?do=intro&id<?=$row['id'];?>">
                <img src="./upload/<?=$row['poster'];?>" style="width:60px;height:80px;border:2px solid white">
            </a>
              </div>
            <div style="width:70%;padding-left:2px">
              <div><?=$row['name'];?></div>
              <div>分級：
                  <img src="./icon/<?=$Level[$row['level']];?>" style="width:18px">
                  <?=$row['level'];?>
              </div>
              <div>上映日期：<?=$row['ondate'];?></div>
              
            </div>
            <div style="width: 100%;">
              <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button>
              <button onclick="location.href='?do=order&id=<?=$row['id'];?>'">線上訂票</button>
            </div>
      
        </div>

        <?php
        }
        ?>
          <div class="ct"> 
          <?php  
          //分頁  待完成
          if(($now-1)>0){

          }
          for($i=1;$i<=$pages;$i++){
            $fontsize=($now==1)?'24px':'18px';
            echo "";
          }

          if(($now+1)<=$pages){

          }

          
          ?>
          </div>
        </div>
      </div>
    