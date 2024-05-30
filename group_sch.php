<?php
include("controls.php");
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Группы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Yanone+Kaffeesatz:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include("header.php");?>
      <div class="main">
        <h1 class="teat"><?=$gr?></h1>
        <div class="row sch_teat">
            <?php foreach ($day as $key=>$name):?>           
              <div class=" col day"><div class="row name_day"><?=$name['day_name'];?></div>
                <div class="row less"> 
                  <?php foreach($schedule as $key=>$value):?>
                    <?php if($id === $value['group']):?>
                      <?php if($name['ID'] === $value['weekday']):?>
                        <?php $start = selecttime('it_cube','start_time',$value['ID']);?>
                        <?php $end = selecttime('it_cube','end_time',$value['ID']);?>
                        <div class="row one_less">
                        <div class="row time"><?=$start['start_time']. '-' .$end['start_time']; ?></div>
                          
                        <?php foreach ($prog as $key=>$name4):?>
                          <?php if($value['program'] === $name4['ID']):?>
                            <div class="row pr"><a name="teat" class="pr" href="prog_sch.php?id_pr=<?=$name4['ID']; ?>"><?=$name4['prog_name']?></a></div>
                          <?php endif;?> 
                        <?php endforeach; ?> 

                        <?php foreach ($all_teachers as $key=>$name3):?>
                          <?php if($value['teatcher'] === $name3['ID']):?>
                            <div class="row pr"><a name="teat" class="room" href="t_sch.php?id=<?=$name3['ID']; ?>"><?=$name3['name']?></a></div>
                          <?php endif;?> 
                        <?php endforeach; ?>
                        
                        <?php foreach ($rooms as $key=>$name5):?>
                          <?php if($value['classroom'] === $name5['ID']):?>
                            <div class="row"><a name="teat" class="room" href="room_sch.php?ID_class=<?=$name5['ID']; ?>"><?=$name5['class_num']?></a></div>
                          <?php endif;?>
                        <?php endforeach; ?>  
                        </div>                                                                       
                      <?php endif;?> 
                    <?php endif;?> 
                  <?php endforeach; ?>
                </div>      
              </div> 
            <?php endforeach; ?>                                                    
          </div>
        </div>
    <script src="https://kit.fontawesome.com/69875254fc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>