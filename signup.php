<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bee-Game Login</title>
    <link href="css/login_modal.css" rel="stylesheet">
    <link  href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 </head>
  <body translate="no"> 

  <button onclick="document.getElementById('id02').style.display='block'" class="btn-hover color-6">REGISTRATI</button>

  <div id="id02" class="modal">
  
    <form class="modal-content animate" action="includes/signup.inc.php" method="post">

      <div class="container form-container">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Il tuo nome" name="username" > <!--name-->

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="example@test.com" name="email" > <!--email-->

        <label for="email"><b>Username (MAX 5 letters)</b></label>
        <input type="text" placeholder="AAAAAA" name="uid" > <!--username-->
        <small id="usernameHelp" class="form-text text-muted">The Username chosen will be displayed in the general rankings</small>

        <label for="pwd"><b>Password</b></label>
        <input type="password" placeholder="**************" name="pwd" > <!--password-->
        <small id="pwdinfo" class="form-text text-muted">The password must be long between 8-16 characts</small> <br>

        <label for="pwdrepeat"><b>Repeat Password</b></label>
        <input type="password"  name="pwdRepeat" > <!--repeat password-->

        <button type="submit" class="button btn-hover color-6" style="height: 70px;" name="submit">REGISTRATI E GIOCA</button> <!--bottone invio-->
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <?php
    if(isset($_GET["error"])){
      if($_GET["error"]=="emptyinput"){
        echo"<p>Riempi i campi!</p>;";
      }
      else if($_GET["error"]=="invaliduid"){
        echo "<p>Cambia username!</p>";
      } 
      else if($_GET["error"]=="invalidemail"){
        echo "<p>Inserisci un'email valida</p>";
      } 
      else if($_GET["error"]=="passwordsdontmatch"){
        echo "<p>Le password non combaciano!</p>";
      } 
      else if($_GET["error"]=="stmfailed"){
        echo "<p>Qualcosa è andato storto!</p>";
      } 
      else if($_GET["error"]=="usernametaken"){
        echo"<p>Cambia username!</p>";
      }
      else if($_GET["error"]=="none"){
        echo"<p>Ti sei registrato!</p>";
      }
    }

  ?>
      </div>
    </form>

  </div>

  
<script src="js/modal_signup.js"></script>
</body>
</html>