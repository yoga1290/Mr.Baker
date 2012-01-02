<?php
//Connect to the MySQL Database:
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

// SQL query:
$query="SELECT Name,idProducts FROM Products WHERE Name like '%".$_GET['name']."%'";
$result=mysql_query($query) or die( "alert('Something went wrong!');");


$n=mysql_numrows($result);

// List Customers IDs & Names:
for($i=0;$i<$n;$i++)
	echo mysql_result($result,$i,"idProducts").":".mysql_result($result,$i,"Name")."\n";

if($n<1)
    echo "None :(";
mysql_close();
?>