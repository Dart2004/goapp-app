<?php
  $msg=$_POST["password"];
  $name = $_POST["name"];
  if ($name!=""&&$msg!=""){
  if($fh = fopen($name.".txt","r")){
    $pass=file_get_contents($name.'.txt');
    if($pass==$msg){
      file_put_contents($name."2.php",'<h1>DASHBOARD</h1>');
      header( "Location:".$name."2.php" );
    }
    else {
      echo 'false password or invalid username';
    }
  }
  else
  {
  $fh=fopen($name.".txt","a");
  file_put_contents($name.".txt",$msg);
  echo "SIGNED UP<br>Please log in";
  }
  }
  echo '<form action="index.php" method="post">
  USERNAME<br><input name="name"><br>
  PASSWORD<br><input name="password" type="password">
  <input type="submit">
  </form>'
?>
