<?php

define('DBSERVER',"localhost");
define('DBUSER',"sooocitrus");
define('DBPASS',"mypass");
define('DATABASE',"IERG4230");

if (!$connection = @ mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("Cannot connect");

@mysql_select_db(DATABASE) or die( "Unable to select database");

$owner=$_POST[owner];
$addr=$_POST[addr];
$phonenum=$_POST[phonenum];
$type=$_POST[ricetype];
$id=$_POST[device_id];
$email=$_POST[email];
$size=$_POST[size];

if(strlen($size) == 0 || strlen($owner) == 0||strlen($addr) == 0 ||strlen($type) == 0||strlen($email) == 0||strlen($phonenum) == 0||strlen($id) == 0){
  echo "Please fill in the empty blocks.<br>";
  header( "refresh:1;url=userpage.html" );
}
else{
$sql = mysql_query("INSERT INTO data (owner, addr, size, phonenum, riceType, id, email, status) VALUES ('$owner', '$addr', '$size', '$phonenum', '$type', '$id', '$email','NEW')");
if(! $sql ){
    die('Could not update data: ' . mysql_error());
}
else{echo "Successfully reg. Redirect to usserpage after 1 second.<br>";
    header( "refresh:1;url=userpage.html" );
}
}
 mysql_close();
?>
