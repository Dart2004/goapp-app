<?php
  $msg=$_POST["password"];
  $name = $_POST["name"];
  if ($name!=""&&$msg!=""){
  if($fh = fopen($name.".txt","r")){
    $pass=file_get_contents($name.'.txt');
    if($pass==$msg){
      header( "Location:".$name."2.php");
    }
    else {
      echo 'false password or invalid username';
    }
  }
  else
  {
  $fh=fopen($name.".txt","a");
  file_put_contents($name.".txt",$msg);
  file_put_contents($name."2.php",'<frameset rows="4*,*"><frame src="1'.$name.'.php"><frame src="2'.$name.'.php"></frameset>');
  file_put_contents("2".$name.".php",'<form action="'.$name.'chat.php" method="post"><input hidden=true value="'.$name.'" name="name"><input type="submit" value="go to my chat"></form>');
  file_put_contents($name."chat.php",'<?php
  $msg=$_POST["msg"];
  $name = $_POST["name"];
  if ($name!=""&&$msg!=""){
  $zeile = $name." had sended ".$msg."\r\n";
  $fs=@fopen("\'.$name.\'chat.txt","a+");
  fwrite($fs , $zeile);
  fclose($fs);
  }
  if($fh = fopen("'.$name.'chat.txt","r")){
        while (!feof($fh)){
          echo fgets($fh,9999)."<br>";
        }
        fclose($fh);
      }
  echo \'<form action="'.$name.'chat.php" method="post">
  NAME<br><input name="name" value="\'.$name.\'"><br>
  MSG<br><input name="msg">
  <input type="submit">
  </form>\'
?>');
  file_put_contents("1".$name.".php",'<nobr>

<div class="table-fixed-left">
<details>
<summary>MENU</summary>
<a href="'.$name.'.website.php">WEBSITE</a>
</details>
</div>
<style>
	.table-fixed-left table,
	.table-fixed-right table {
	  border-collapse: collapse;
	}
	.table-fixed-right td,
	.table-fixed-right th,
	.table-fixed-left td,
	.table-fixed-left th {
	  padding: 5px 5px;
	}
	.table-fixed-left {
	  width: 120px;
	  float: left;
	  position: fixed;
	  white-space: nowrap;
	  text-align: left;
	  z-index: 2;
	}
	.table-fixed-right {
	  height: calc(100% - 145px);
	  left: 120px;
	  position: fixed;
	  overflow-y: scroll;
	  white-space: nowrap;
	}
	.table-fixed-right td,
	.table-fixed-right th {
	  padding: 5px 10px;
	}
</style>
<div class="table-fixed-right">
<h1>Dashboard</h1><br>
</div>
</nobr>');
file_put_contents($name.".website.php",'
<?php
$webname=$_POST["name"];
$webcode=$_POST["code"];
if($webname=="")
{

}
else
{
  
  file_put_contents($webname.".html",\'<nobr>

<div class="table-fixed-left">
<details>
<summary></summary>
<a href="1'.$name.'.php">Back to Dashboard</a>
</details>
</div>
<style>
	.table-fixed-left table,
	.table-fixed-right table {
	  border-collapse: collapse;
	}
	.table-fixed-right td,
	.table-fixed-right th,
	.table-fixed-left td,
	.table-fixed-left th {
	  padding: 5px 5px;
	}
	.table-fixed-left {
	  width: 120px;
	  float: left;
	  position: fixed;
	  white-space: nowrap;
	  text-align: left;
	  z-index: 2;
	}
	.table-fixed-right {
	  height: calc(100% - 145px);
	  left: 120px;
	  position: fixed;
	  overflow-y: scroll;
	  white-space: nowrap;
	}
	.table-fixed-right td,
	.table-fixed-right th {
	  padding: 5px 10px;
	}
</style>
<div class="table-fixed-right">
<h1>
</nobr><title>\'.$webname.\'</title>\'.$webcode);
$web = fopen ("1'.$name.'.php", "a+");
fwrite($web,\'<a href="\'.$webname.\'.html">\'.$webname.\'<br></a>\');
  echo $webname." created<br><form action=\'".$webname.".html\'><input type=\'submit\' value=\'Look on ".$webname."\'></form></h1><br>
</div>";

}
echo \'<nobr>

<div class="table-fixed-left">
<details>
<summary>MENU</summary>
<a href="'.$name.'.website.php">Back to Dashboard</a>
</details>
</div>
<style>
	.table-fixed-left table,
	.table-fixed-right table {
	  border-collapse: collapse;
	}
	.table-fixed-right td,
	.table-fixed-right th,
	.table-fixed-left td,
	.table-fixed-left th {
	  padding: 5px 5px;
	}
	.table-fixed-left {
	  width: 120px;
	  float: left;
	  position: fixed;
	  white-space: nowrap;
	  text-align: left;
	  z-index: 2;
	}
	.table-fixed-right {
	  height: calc(100% - 145px);
	  left: 120px;
	  position: fixed;
	  overflow-y: scroll;
	  white-space: nowrap;
	}
	.table-fixed-right td,
	.table-fixed-right th {
	  padding: 5px 10px;
	}
</style>
<div class="table-fixed-right">
<form action="'.$name.'.website.php" method="post">
<input placeholder="Name of website" value="\'.$webname.\'" name="name" id="name">
<input placeholder="Code of website(HTML)" value="\'.$webcode.\'" name="code" id="code">
<input type="submit" hidden=true>
</form>\'
?>
');
  echo "SIGNED UP<br>Please log in";
  }
  }
  echo '<form action="index.php" method="post">
  NAME<br><input name="name" value=""><br>
  MSG<br><input type="password" name="password">
  <input type="submit">
  </form>'
?>
