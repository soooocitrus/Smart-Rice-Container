<?php

define('DBSERVER',"localhost");
define('DBUSER',"sooocitrus");
define('DBPASS',"mypass");
define('DATABASE',"IERG4230");

if (!$connection = @ mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("database cannot connect");
@mysql_select_db(DATABASE) or die( "Unable to select database");
$id = $_POST[id];
$query=mysql_query("SELECT status FROM data WHERE id = '$id'");
$query_row=mysql_fetch_array($query);
if(!$query_row[status]){
    echo "query problem";
}
else{
    if($query_row[status] == "EMPTY"){
        $result1=mysql_query("UPDATE data SET status = 'DELIVER' WHERE id = '$id'");
    }
    if($query_row[status] == "ROTTED"){
        $result2=mysql_query("UPDATE data SET status = 'DELIVER' WHERE id = '$id'");
    }
    header('Location: traderpage.php');
}
mysql_close();
?>