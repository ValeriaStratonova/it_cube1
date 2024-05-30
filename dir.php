<?php
include("controls.php");
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Программы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Yanone+Kaffeesatz:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php include("header.php");?>
    <div class="main">
      <h1 class="teat">Программы</h1>
      <div class="but2">
        <?php foreach ($prog as $key=>$name):?>
            <?php if ($name['direction'] === $id):?>
                <button name="teacher" class="teachers"><a name="teat" class="teat" href="groups.php?ID_prog=<?=$name['ID']; ?>"><?=$name['prog_name']; ?></a></button>
                <div class="gr_block">
                <?php foreach ($gr as $key1=>$name1):?>
                    <?php if($name1['prog']===$name['ID']):?>
                        <button name="teacher" class="grop"><a name="teat" class="teat" href="group_sch.php?ID_group=<?=$name1['ID']; ?>"><?=$name1['name_gr']; ?></a></button>
                    <?php endif;?>
                <?php endforeach;?>
                    </div>
            <?php endif;?>
        <?php endforeach; ?>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/69875254fc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>