<?php
//Connect to the MySQL Database:
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

// SQL query:
$query="SELECT Name,idSuppliers FROM Suppliers WHERE Name like '%".$_GET['Suppliers_Name']."%'";
$result=mysql_query($query) or die( "alert('Something went wrong!');");


$n=mysql_numrows($result);

// List Suppliers IDs & Names:
for($i=0;$i<$n;$i++)
	echo .mysql_result($result,$i,"idSuppliers").":".mysql_result($result,$i,"Name")."\n";

?>