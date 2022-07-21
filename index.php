<?php
    include "function.php";   //includo lo script php
    include "messages.php";   //includo gli array con i messaggi
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bee-Game</title>
    <link  href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> <!--libreria animazioni-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
 </head>
<body translate="no">

  <div class="container-fluid">

  <div class="row align-items-start">

    <div class="col">
    </div>

    <div class="col-sm animate__animated animate__headShake">
        <img src="img/bee_h1.svg" class="icon rotateimg90" width="60" height="60" style="margin-top: -30px;"> <!--svg ai lati di h1-->
        <h1 class="title ">Bee</h1><h1 class="title" style="color:#ffcc00;">Game</h1>
        <img src="img/bee_h1.svg" class="icon rotateimg-90" width="60" height="60" style="margin-top: -30px;">  <!--svg ai lati di h1-->
    </div>

    <div class="col"> 
      <?php
        if (isset($_SESSION["useruid"])){
          include('login.php');
          echo"<form action='includes/logout.inc.php'>
          <button type='submit' class=' btn-hover color-6' name='submit' >LOGOUT</button>
        </form>";
        }
        else{
          include('signup.php');
          include ('login.php');
        }
      ?>
    </div>

  </div>

  <div class="row align-items-center">

    <div class="col-sm-6 .col-md-2 .col-lg-6">
    <table class="table">
    <tbody>
    <tr>
      <td><img src="img/queen_bee.gif" width="80" height="80">
        <?php  
          HpControl(0,$arr_of_bees);
        ?>

      <td><img src="<?=check_show_img($arr_of_bees,1)?>" width="80" height="80">
        <?php 
          HpControl(1,$arr_of_bees);
        ?>
        
      </td>

      <td><img src="<?=check_show_img($arr_of_bees,2)?>" width="80" height="80">
            
        <?php 
          HpControl(2,$arr_of_bees);
        ?>
      </td>

      <td><img src="<?=check_show_img($arr_of_bees,3)?>" width="80" height="80">
        <?php 
          HpControl(3,$arr_of_bees);
        ?>
      </td>

      <td><img src="<?=check_show_img($arr_of_bees,4)?>" width="80" height="80">
        <?php 
          HpControl(4,$arr_of_bees);
        ?>
      </td>

    </tr>
    <tr>

      <td><img src="<?=check_show_img($arr_of_bees,5)?>" width="80" height="80">
        <?php 
          HpControl(5,$arr_of_bees);
        ?>
      </td>

      <td><img src="<?=check_show_img($arr_of_bees,6)?>" width="80" height="80">
        <?php 
          HpControl(6,$arr_of_bees);
        ?>
      </td>

      <td><img src="<?php echo check_show_img($arr_of_bees,7)?>" width="80" height="80">
        <?php 
          HpControl(7,$arr_of_bees);
        ?>
      </td>

      <td><img src="<?=check_show_img($arr_of_bees,8)?>" width="80" height="80">
        <?php 
          HpControl(8,$arr_of_bees);
        ?>
      </td>

      <td><img src="<?=check_show_img($arr_of_bees,9)?>" width="80" height="80">
        <?php 
          HpControl(9,$arr_of_bees);
        ?>
      </td>

    </tr>
  </tbody>
  </table>
          <div class="stats">
          <?php echo" <h2>Hai colpito un'ape $bee_type</h2>";?>
          <h3> Colpi Assestati: <?=$hits?></h3>
          <h2>Api uccise: <?=$killedbees?></h2>
          </div> <!--stats-->
    </div>


    <div class="col-sm-6 .col-md-2 .col-lg-6">
    <form method="post">
      <div class="btn-group" role="group" aria-label="Basic example" style="padding-top:70px;">
        <button type="submit" class="btn btn-lg hit button btn-hover color-6" name="hit">  COLPISCI UN'APE!!!!</button>
        <div class="spazio"></div> 
        <button type="submit" class="btn btn-success btn-lg  button btn-hover color-6" name="refresh">  RIGIOCA</button>
      </div>
    </form>  

    <div class="info animate__animated animate__bounceIn ">
    <?php  //includo gli array images e messages per mostrare immagini e testo 
        $random_image=0;
        if(array_key_exists('hit',$_POST)) {
          $random_image = array_rand($images);
        }
    ?>
  <img src="<?php echo $images[$random_image]; //immagine a sinistra schermo?>" class=".img-fluid" height="300" width="500"/>
    <p style="font-size:25px; background-color:bisque; margin-top:30px; height:70px;">
      <?php echo $messages[rand(0, count($messages) - 1)];  //informazioni sotto la foto
      ?>
    </p>


    </div> <!--img e descrizione-->

  </div> <!--colonna-->

  </div> <!--align items center-->

  </div> <!--container--fluid-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>