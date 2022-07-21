<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The End</title>
    <link  href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> <!--libreria animazioni-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  </head>
  <body translate="no">

  <?php include "function.php";  //funzione principale?>

  <div class="container-fluid">
  <div class="row">

    <div class="logo" >   
        <img src="img/bee_h1.svg" class="icon rotate_left" width="60" height="60" style="margin-top: -30px;"> <!--svg ai lati di h1-->
        <h1 class="title ">Bee</h1><h1 class="title" style="color:#ffcc00;">Game</h1>
        <img src="img/bee_h1.svg" class="icon rotate_right" width="60" height="60" style="margin-top: -30px;">  <!--svg ai lati di h1-->
    </div> <!--logosito -->

    <div class="col animate__animated animate__zoomInUp">
     <h1 class="endgame" style="padding: 20px;">Hai ucciso l'ape regina utilizzando <?=$hits?> colpi<br>Clicca su "MI PENTO" per riportarle tutte in vita!</h1>
     <form method="post">
     <button type="submit" class="btn btn-success btn-lg  button btn-hover color-6" name="refresh">  MI PENTO</button>
    </form>

    <?php
      recordingHits($hits,$conn,$_SESSION['useruid']);
    ?>

  
    <div class="col-lg">
        <h1 class="title">Classifica Globale</h1>
      <?php
        printRanks($conn)
      ?>
    </div>

    </div>  <!--col-->

  </div>   <!--row-->

    </div> <!--container-fluid-->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>