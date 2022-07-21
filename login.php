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


  <button onclick="document.getElementById('id01').style.display='block'" class="btn-hover color-6">LOGIN</button>
  
  <div id="id01" class="modal">
  
    <form class="modal-content animate" action="includes/login.inc.php" method="post">

      <div class="container form-container">
        <label for="name"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uid"> <!--username-->

        <label for="pwd"><b>Password</b></label>
        <input type="password" placeholder="****************" name="pwd">

        <button type="submit" class="button btn-hover color-6" style="height: 70px;" name="submit">GIOCA</button>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <?php
        include_once 'function.php';
          if(isset($_GET["error"])){
          if($_GET["error"]=="emptyinput"){
            echo"<p>Riempi i campi!</p>;";
          }
          else if($_GET["error"]=="wronglogin"){
            echo "<p>Credenziali non corrette!</p>";
          } 
        }
        if(isset($_POST['submit'])){
          $_SESSION['uid']=$_POST['uid'];
        }
        ?>
      </div>
    </form>

  </div>
<script src="js/modal_login.js"></script>
</body>
</html>