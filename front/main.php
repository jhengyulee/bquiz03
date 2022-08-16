<style>
  .list *, .controls *{
    box-sizing: border-box;
  }
  .lists{
    width: 210px;
    height: 280px;
    margin: auto;
    position: relative;
  }

  .controls{
    width: 420px;
    height: 100px;
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
    border-left:30px solid #ccc ;
    
  }

  .left{
    
    border-right:30px solid #ccc ;
  }

  .icons{
    width: 320px;
    height: 100%;
    display: flex;
    overflow: hidden;
  }

  .poster{
    width: 100%;
    text-align: center;
    position: absolute;  /* 才會定位在左上角 */
    display: none;
  }

  .poster img{
    width: 99%;
  }

  .icon{
    width: 80px;
    flex-shrink: 0;
    padding: 2px;
    text-align: center;
    font-size: small;
  }

  .icon img{
    width: 70px;
  }
  
  .left:hover,
  .right:hover,
  .icon:hover{
    cursor: pointer;
  }

  .icon:hover{
    border: 2px solid white;
  }
</style>

<div class="half" style="vertical-align:top;">
        <h1>預告片介紹</h1>
        <div class="rb tab" style="width:95%;">
          <div>
            <div class="lists">
            <?php
            $pos=$Poster->all(['sh'=>1]," order by rank");
            foreach($pos as $key => $po){
              echo "<div class='poster' id='p{$po['id']}' data-ani='{$po['ani']}'>";
              echo "<img src='./upload/{$po['img']}'>";
              echo "<div>{$po['name']}</div>";
              echo "</div>";
            }
            ?>
            </div>
            <div class="controls">
              <div class="left"></div>
              
              <div class="icons">
              <?php

              foreach($pos as $key => $po){
                echo "<div class='icon' id='i{$po['id']}' data-ani='{$po['ani']}'>";
                echo "<img src='./upload/{$po['img']}'>";
                echo "<div>{$po['name']}</div>";
                echo "</div>";
              }


              ?>
              </div>
              <div class="right"></div>
            </div>
          </div>
        </div>
      </div>


      <script>
        //動畫控制方法
        $(".poster").eq(0).show(); //$(".poster")是個-陣列-物件；eq(0)索引值為0的物件
        let start=0;
        $(".icon").on("click",function(){
          let now=$(".poster:visible").hide();
          let id=$(this).attr("id").replace("i","p");
          $("#"+id).show();
        })

        let slider=setInterval(()=>{ transition() },2000); //為解題而做

        function transition(){
          let now=$(".poster:visible");
          let eq=$(now).index();
          //判斷下一張海報的索引值
          if(eq==$(".icon").length-1){ //若為最後一張   
            eq=0;
          }else{
            eq=eq+1;
          }
          let next=$(".poster").eq(eq);
          let ani=$(now).data('ani')

          switch(ani){
            case 1: //淡入淡出
            
              $(now).fadeOut(800,()=>{  //現在的消失
                $(next).fadeIn(800); //下一個進來
              })
      
              break;
            case 2: //滑入滑出

              $(now).slideUp(800,()=>{
                $(next).slideDown(800);
              })

              break;
            case 3: //縮放
              $(now).hide(800,()=>{
                $(next).show(800);
              })
              
              break;
          }
        }
        // let slider=setInterval(()=>{
        //     $(".poster").eq(start).fadeOut(800,()=>{

        //       if(start >= $(".poster").length-1){
        //         start=0;
        //       }else{
        //         start++;
        //       }
        //       console.log("現在跑的是eq"+start+"的海報");
        //       $(".poster").eq(start).fadeIn(800);
                  
        //     })
            
        // },2000)

        let p=1;
        let pages=$(".poster").length-4; //畫面已先顯示4張圖 故總數-4

          //當 .left/.right被點擊時 判斷點的是哪一邊
        $(".left,.right").on("click",function(){
          let arrow=$(this).attr('class');
          // console.log(arrow);
          
          // 決定頁面在哪裡
          let shift;
          switch(arrow){
              case "left":
                if(p<1){

                }

              case "right":
                if(p>pages){

                }  
          }
        })
      </script>

      
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
        <div style="display:flex;flex-wrap:wrap;border:1px solid #ccc;border-radius:10px;width:49.5%;padding:5px;box-sizing:border-box;margin:2px 0">
            <div style="width:30%">
            <a href="?do=intro&id=<?=$row['id'];?>">
                <img src="./upload/<?=$row['poster'];?>" style="width:60px;height:80px;border:2px solid white">
            </a>
              </div>
            <div style="width:70%;padding-left:2px;box-sizing:border-box">
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
          <div class="ct" style="width:100%;"> 
          <?php  
          //分頁 
          if(($now-1)>0){
            $p=$now-1;
            echo "<a href='?p={$p}'> </a>";
          }
          for($i=1;$i<=$pages;$i++){
            $fontSize=($now==$i)?'24px':'18px';
            echo "<a href='?p={$i}' style='font-size:{$fontSize}'> $i </a>";
          }

          if(($now+1)<=$pages){
            $p=$now+1;
            echo "<a href='?p={$p}'> </a>"; 
          }

          
          ?>
          </div>
        </div>
      </div>
    

      