<?php
include("controls.php");
?>
<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Преподаватели</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Yanone+Kaffeesatz:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php include("header.php");?>
    <div class="main">
      <h1 class="teat">Преподаватели</h1>
      <div class="but">
      <?php foreach ($all_teachers as $key=>$name):?>
          <button name="teacher" class="teachers"><a name="teat" class="teat" href="t_sch.php?id=<?=$name['ID']; ?>"><?=$name['name']; ?></a></button>
      <?php endforeach; ?>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/69875254fc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>