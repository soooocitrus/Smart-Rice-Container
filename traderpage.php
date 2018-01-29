<!DOCTYPE HTML>
<!--
	Aerial 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
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
	<head>
	  <style>
      input[type=text] {
        height: 85%;
        padding:5px; 
        border:2px solid #ccc; 
        -webkit-border-radius: 10px;
        border-radius: 7px;
        display: inline-block;
        color: white;
        background-color: #2b2e3b;
      }
      input[type=password] {
        height: 85%;
        padding:5px; 
        border:2px solid #ccc; 
        -webkit-border-radius: 10px;
        border-radius: 7px;
        color: white;
        background-color: #2b2e3b;
      }
      input[type=text]:focus {
        border-color:#333;
      }
      input[type=password]:focus {
        border-color:#333;
      }
      input[type=submit] {
        padding:5px 15px; 
        background:#ccc; 
        border:0 none;
        cursor:pointer;
        -webkit-border-radius: 10px;
        border-radius: 10px; 
        background-color: #606785;
        opacity: 0.8;
      }
      input[type=reset] {
        padding:5px 15px; 
        background:#ccc; 
        border:0 none;
        cursor:pointer;
        -webkit-border-radius: 10px;
        border-radius: 10px; 
        background-color: #606785;
        opacity: 0.8;
      }
      select{
        width:100%;
        height:85%;
        padding:5px; 
        border:2px solid #ccc; 
        -webkit-border-radius: 10px;
        border-radius: 7px;
        text-align:center;
        background-color: #2b2e3b;
      }
      table {
    		border-collapse: collapse;
    		border-radius: 7px;
   			text-align:center;
   			font-family: 'Source Sans Pro', sans-serif;
			}
			tr:nth-child(even){background-color: #91a5ba}
			th {
    		background-color: #2b2e3b;
    		color: white;
			}
			td{
				height:10px;
			}
			table, td, th {
   			padding: 15px;
			}
    </style>
		<title>IERG4230 demo website</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>IERG4230 -- Smart Rice Barrel</h1>
						<p>T2 group &nbsp;&bull;&nbsp; XU Jinhan 1155046948&nbsp;&bull;&nbsp; LI HaoCheng 1155047102</p>
						<nav>
							<ul>
								<li><a href="IERG_4230_Thu_Group2_proposal.pdf" class="fa fa-file"><span>proposal</span></a></li>
								<li><a href="customer_introduction.html" class="fa fa-users"><span>customer_introduction</span></a></li>
								<li><a href="retailer_introduction.html" class="fa fa-user"><span>retailer_introduction</span></a></li>
								<li><a href="limitaion.html" class="fa fa-comment"><span>limitaion</span></a></li>
								<!--li><a href="report.html" class="fa fa-ban"><span>report</span></a></li-->
								<li><a href="login.html" class="fa fa-key"><span>login</span></a></li>
								<li><a href="signup.html" class="fa fa-cloud"><span>signup</span></a></li>
								<li><a href="traderpage_specification.html" class="fa fa-book"><span>specification</span></a></li>
							</ul>
						</nav>
							<p>Rice Barrel Information for April 2016</p>
								<center>
									<table BORDER = "1">
										<tr BGCOLOR="#606785">
      								<th><b>User Name</b></th>
      								<th><b>ID</b></th>
											<th><center><b>Address</b></center></th>
											<th><b>Contact Number</b></th>
      								<th><b>Rice Type</b></th>
        							<th><b>Size</b></th>
											<th><b>Status</b></th>
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
											$id = mysql_result($result,$i,"id");

											print '<tr BGCOLOR="#606785">';
											print "<td>".$name."</td>";
											print "<td>".$id."</td>";
											print "<td>".$addr."</td>";
											print "<td>".$phnum."</td>";
											print "<td>".$riceType."</td>";
											print "<td>".$size."</td>";
											print "<td>".$status."</td>";
											print "</tr>";
											$i++;
										}
									?>
									</table>
									<form method="post" action="deliver.php">
										<p>I want to deliver the ID
										<input type="text" name="id" size="2" maxlength="20">
										device.</p>
										<input type="submit" name="submit" value="Sbmit">
 									 	<input type="reset" name="reset" value="Reset">
										<p>&nbsp;</p>
									</form>
									<meta http-equiv="refresh" content="20">
								</center>
					</header>
				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
					</footer>
			</div>
		</div>
	</body>
</html>