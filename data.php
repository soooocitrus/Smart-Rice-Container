<?php

define('DBSERVER',"localhost");
define('DBUSER',"sooocitrus");
define('DBPASS',"mypass");
define('DATABASE',"IERG4230");

if (!$connection = @ mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("database cannot connect");
@mysql_select_db(DATABASE) or die( "Unable to select database");

if (isset($_REQUEST['id'])&&isset($_REQUEST['status'])){
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];
    $query=mysql_query("SELECT status FROM data WHERE id = '$id'");
    $query_row=mysql_fetch_array($query);
    if(!$query_row[status]){
        echo "query problem";
    }
    else{
        if($status == "EMPTY" || $status == "ROTTED"){
            if($query_row[status] == "DELIVER"){
                
            }
            else {
                $result1=mysql_query("UPDATE data SET status = '$status' WHERE id = '$id'");
            }
        }
        else{
            $result2=mysql_query("UPDATE data SET status = '$status' WHERE id = '$id'");
        }
    }
}
else{
    echo "ho no!";
}
mysql_close();

?>