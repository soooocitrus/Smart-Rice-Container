<!DOCTYPE html>
<html>
<?php

define('DBSERVER',"localhost");
define('DBUSER',"sooocitrus");
define('DBPASS',"mypass");
define('DATABASE',"IERG4230");

if (!$connection = @ mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("database cannot connect");

@mysql_select_db(DATABASE) or die( "Unable to select database");


$var1=$_POST[name];
$var2=$_POST[pswd];
$type=$_POST[usertype];
echo $type;
if(strlen($var1) == 0 || strlen($var2) == 0){
  echo "Please fill in the empty blocks.<br>";
  header( "refresh:1;url=login.html" );
}

else if($type  == "trader"){
    $sql = "SELECT * FROM traderdb WHERE name = '$var1' AND psswd = '$var2'";
    $result = mysql_query($sql, $connection);
    $query_row=mysql_fetch_array($result);
    echo $query_row[name];
    if(!$query_row[name]){
      header('Location: login.html');
    }
    else{
        header('Location: traderpage.php');
    }
}
else{
    $sql = "SELECT * FROM userdb WHERE name = '$var1' AND psswd = '$var2'";
    $result = mysql_query($sql, $connection);
    if(!$result){
      header('Location: login.html');
    }
    else{
        header('Location: userpage.html');
    }
}

 mysql_close();

?>
</html>
