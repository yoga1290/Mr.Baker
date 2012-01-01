<?php
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

$query="SELECT Name,idSuppliers FROM Suppliers";
$result=mysql_query($query) or die( "alert('Something went wrong!');");
$n=mysql_numrows($result);
?>

var suppliers=new Array(<?php 
if($n>0)
	echo "'".mysql_result($result,0,"Name")."'";

for($i=1;$i<$n;$i++) echo ",'".mysql_result($result,$i,"Name")."'"; ?>);

var suppliers_id=new Array(<?php 
if($n>0)
	echo "'".mysql_result($result,0,"idSuppliers")."'";

for($i=1;$i<$n;$i++) echo ",'".mysql_result($result,$i,"idProducts")."'"; ?>);

<?php mysql_close(); ?>