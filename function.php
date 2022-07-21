<?php
session_start();
require_once 'includes/dbh.inc.php';

      $queenBeeHp=100;                       //hp queen bee
      $workerBeeHp=100;                      //hp ape wroker
      $droneBeeHp=100;                       //hp ape drone
      $arr_of_bees=[];                       //array di oggeti ape
      $killedbees=0;                         //contatore api uccise
      $bee_type='';                          //tipo di ape
      $hits=0;                               //colpi assegnati           
      $img_alive='img/bee_game_icon.svg';
      $img_dead='img/croce.svg';

      if(array_key_exists('array',$_SESSION))
        $arr_of_bees=$_SESSION['array'];

      if(array_key_exists('counter',$_SESSION))
        $killedbees=$_SESSION['counter'];  

      if(array_key_exists('hits',$_SESSION))  
        $hits=$_SESSION['hits'];

        function check_show_img($arr_bee,$index){
          global $img_alive;
          global $img_dead;
          $exists=array_key_exists($index,$arr_bee);
          if($exists && $arr_bee[$index]->hp>0)
          {
            return $img_alive;
          }
          else{return $img_dead;}
        }


    class Bee{                                          //Classe Ape
        protected $hp=100;
        protected $damage=10;

        public function hit()                           //funzione che abbassa gli hp
        {
            $this->hp-=$this->damage;
            return $this->hp;
        }  

        public function test()                          //funzione di controllo hp<0
        {
            return $this->hp>0;
        }

        public function __get($property)
        {
          if (property_exists($this, $property))
            return $this->$property;
        }
    }
  
        class Queen_Bee extends Bee{                    //classe Queen Bee
            public $hp=100;
            protected $damage=8;
        }

        class Worker_Bee extends Bee{                   //classe Worker Bee
            public $hp=100;
            protected $damage=10;
        }

        class Drone_Bee extends Bee{                    //classe Drone Bee
            public $hp=100;
            protected $damage=12;
        }

        
      if(empty ($arr_of_bees)){
        $arr_of_bees[]=new Queen_Bee($hp=$queenBeeHp);                  //inzializzazione oggetto queen bee


        for($i=1;$i<=4;$i++){                                           //inzializzazione oggetti worker bee
            $arr_of_bees[]=new Worker_Bee($hp=$workerBeeHp, $n=$i);
        }

        for($i=1;$i<=5;$i++){                                           //inzializzazione oggetti drone bee
            $arr_of_bees[]=new Drone_Bee($hp=$droneBeeHp, $n=$i);
        }
      }
        
        function rand_Bee($arr){                                       //funzione scelta ape random

            $random=array_rand($arr);           
            $hit=$arr[$random]->hit();          
            $hit;
            return $random;
        }  

        function HpControl($param,$arr){
          if(array_key_exists($param,$arr)){
            $width=(int)$arr[$param]->hp;
          }else{$width=0;
              }
            echo '<div class="progress" style="margin-top: 20px;">
                    <div class="progress-bar bg-success" style="width:'.$width.'%" role="progressbar" aria-valuenow="100"aria-valuemin="0" aria-valuemax="100" ></div>
                  </div>';
        }

        

        $queenAlive=true;
        if(array_key_exists('hit',$_POST)) {          //pulsante "colpisci un'ape"
            $hits++;                                  //counter colpi tirati
            $rand_num=rand_Bee($arr_of_bees);
            $queenAlive=$arr_of_bees[0]->test();
            $beeAlive=$arr_of_bees[$rand_num]->test();
            
            if($rand_num==0)                          //controllo tipologia ape
              $bee_type='Regina';
            elseif($rand_num >=1 && $rand_num<=4)  
            $bee_type='Lavoratore';
            else{ $bee_type='Drone';}

            if($queenAlive==false)                    //controllo vita Ape Regina
              {
                header("Location:end.php");
              }  
            if($beeAlive==false)                       //controllo risultato funzione test
              {
                unset($arr_of_bees[$rand_num]);  //elimina l'elemento dall'array se il metodo test() restituisce false       
                $killedbees++;      
              } 
        }

        if(array_key_exists('refresh',$_POST)) {          //pulsante "mi pento"
          session_destroy();
          header("Location:index.php");                   //redirect all'index

        }
        $_SESSION['array']=$arr_of_bees;                    //aggiornamento array di api
        $_SESSION['counter']=$killedbees;                   //aggiornamento counter api
        $_SESSION['hits']=$hits;

//funzioni login


function emptyInputSignup($name,$email, $username,$pwd,$pwdRepeat){
  $result=true;
      if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty ($pwdRepeat)){
          $result=true;
      }
      else{$result=false;}
  return $result;    
}

function invalidUid($username){
  $result=true;
      if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
          $result=true;
      }
      else{$result=false;}
  return $result; 
}

function invalidEmail($email){
  $result=true;
      if(filter_var($email,FILTER_VALIDATE_EMAIL)){
          $result=true;
      }
      else{$result=false;}
  return $result;
}

function pwdMatch($pwd,$pwdRepeat){
  $result=true;
      if($pwd !== $pwdRepeat){
          $result=true;
      }
      else{$result=false;}
  return $result;
}

function uidExists($conn,$username,$email){
  $sql="SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
  $stmt=mysqli_stmt_init($conn);

  if( !mysqli_stmt_prepare($stmt,$sql) ){
      header("Location: ../signup.php?error=stmfailed");
      exit();
  }

  mysqli_stmt_bind_param($stmt,"ss",$username,$email);
  mysqli_stmt_execute($stmt);

  $resultData=mysqli_stmt_get_result($stmt);

  if( $row=mysqli_fetch_assoc($resultData) ){
      return $row;
  } 
  else{
      $result=false;
      return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$username,$pwd){
  $sql="INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
  $stmt=mysqli_stmt_init($conn);

  if( !mysqli_stmt_prepare($stmt,$sql) ){
      header("Location: ../signup.php?error=stmfailed");
      exit();
  }

  $hashedPWd=password_hash($pwd, PASSWORD_DEFAULT); //crittografia password

  mysqli_stmt_bind_param($stmt,"ssss",$name,$email, $username,$hashedPWd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: ../index.php?error=none");
  exit();
}

function emptyInputLogin($username,$pwd){
  $result=true;
      if(empty($username) || empty($pwd)){
          $result=true;
      }
      else{$result=false;}
  return $result;
}

function loginUser($conn,$username,$pwd){
  $uidExists=uidExists($conn,$username,$username);

  if($uidExists==false){
      header("Location: ../login.php?error=wronglogin");
      exit();
  }

  $pwdhashed=$uidExists["usersPwd"];
  $checkPwd=password_verify($pwd,$pwdhashed);

  if($checkPwd===false){
      header("Location: ../login.php?error=wronglogin");
      exit();
  }
  else if($checkPwd===true){
      $_SESSION["userid"]=$uidExists["usersId"];
      $_SESSION["useruid"]=$uidExists["usersUid"];
      header("Location: ../index.php");
      exit();
  }
}

function recordingHits($hits,$conn,$username){
    $sql="UPDATE users SET usersHits=$hits WHERE usersUid = '$username'; ";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
}

function printRanks($conn){
  $query="SELECT usersUid,usersHits FROM users";
  $result= mysqli_query($conn,$query);
  echo "<table class='table rankings'>";
  echo"<th>Username</th> <th>Hits</th>";
  while($row=mysqli_fetch_array($result)){
    echo"<tr><td>" . $row['usersUid'] . "</td><td>" . $row['usersHits'] . "</td></tr>";
  }

  echo "</table>";
  mysqli_close($conn);
}