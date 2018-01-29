<?php

define('DBSERVER',"localhost");
define('DBUSER',"sooocitrus");
define('DBPASS',"mypass");
define('DATABASE',"IERG4230");

if (!$connection = @ mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("Cannot connect");

@mysql_select_db(DATABASE) or die( "Unable to select database");

$name=$_POST[name];
$pswd=$_POST[pswd];
$email=$_POST[email];
$phnum=$_POST[phnum];
$type=$_POST[usertype];

if(strlen($name) == 0 || strlen($pswd) == 0||strlen($email) == 0 ||strlen($phnum) == 0){
  echo "Please fill in the empty blocks.<br>";
  header( "refresh:1;url=signup.html" );
}

else{ if($type == "trader"){
    $query=mysql_query("SELECT name FROM traderdb WHERE name = '$name'");
    $query_row=mysql_fetch_array($query);
    if($query_row[name]){
      echo "This username is already exsited, please change it.<br>";
      header( "refresh:1;url=signup.html" );
    }
    else {
      $shenme = mysql_query("INSERT INTO traderdb (name, psswd, email, phonenum) VALUES ('$name', '$pswd', '$email', '$phnum')");
      if(! $shenme ){
          die('Could not update data: ' . mysql_error());
      }
      echo "Successfully trader sign up. Redirect to homepage after 1 second.<br>";
      header( "refresh:1;url=index.html" );
    }
}
else{
    $query=mysql_query("SELECT name FROM userdb WHERE name = '$name'");
    $query_row=mysql_fetch_array($query);
    if($query_row[name]){
      echo "This username is already exsited, please change it.<br>";
      header( "refresh:1;url=signup.html" );
    }
    else {
      $shenme = mysql_query("INSERT INTO userdb (name, psswd, email, phonenum) VALUES ('$name', '$pswd', '$email', '$phnum')");
      if(! $shenme ){
          die('Could not update data: ' . mysql_error());
      }
      echo "Successfully user sign up. Redirect to homepage after 1 second.<br>";
      header( "refresh:1;url=index.html" );
    }
}
}
 mysql_close();
?>
