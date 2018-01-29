<html>
<body>

<?php

define('DBSERVER',"localhost");
define('DBUSER',"sooocitrus");
define('DBPASS',"mypass");
define('DATABASE',"IERG4230");

if (!$connection = @ mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("Cannot connect");

@mysql_select_db(DATABASE) or die( "Unable to select database");

$query="SELECT * FROM data;";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="GENERATOR" content="Mozilla/4.72 [en] (Windows NT 5.0; I) [Netscape]">
   <title>Users Data</title>
</head>
<body style="background-color:lightgrey;">

<h3 align="center">User data table</h3>
<center>
<h3>
Rice Barrel Information for April 2016</h3></center>
<center><table BORDER >
<tr BGCOLOR="#FFFF64">
      <td><b>User Name</b></td>

<td>
<center><b>Address</b></center>
</td>

      <td><b>Contact</b> <br>
        <b>Number</b></td>

      <td><b>Rice Type</b>
        </td>
        <td><b>Size</b></td>

<td><b>Status</b></td>
</tr>

<?php
$i=0;
while ($i < $num) {
	$name = mysql_result($result,$i,"owner");
	$addr = mysql_result($result,$i,"addr");
	$size = mysql_result($result,$i,"size");
	$phnum = mysql_result($result,$i,"phonenum");
	$riceType = mysql_result($result,$i,"RiceType");
	$status = mysql_result($result,$i,"status");

	print '<tr BGCOLOR="#FFFFA0">';
	print "<td>".$name."</td>";
	print "<td>".$addr."</td>";
	print "<td>".$phnum."</td>";
	print "<td>".$riceType."</td>";
	print "<td>".$size."</td>";
	print "<td>".$status."</td>";
	print "</tr>";
	$i++;
}
?>

</tr>
</table>
<meta http-equiv="refresh" content="30">
</center>

</body>
</html>
