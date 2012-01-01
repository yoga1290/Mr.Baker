<?php
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

$query="SELECT Name,idProducts FROM product";
$result=mysql_query($query);
$n=mysql_numrows($result);
?>

var products=new Array(<?php 
if($n>0)
	echo "'".mysql_result($result,0,"Name")."'";

for($i=1;$i<n;$i++) echo ",'".mysql_result($result,$i,"Name")."'"; ?>);

var products_id=new Array(<?php 
if($n>0)
	echo "'".mysql_result($result,0,"idProducts")."'";

for($i=1;$i<n;$i++) echo ",'".mysql_result($result,$i,"idProducts")."'"; ?>);

<?php
mysql_close(); ?>