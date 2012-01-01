<html>
<head>
<title>Mr. Baker!</title>
<script src="js_suppliers.php?cache=no"></script>
</head>
<body>
<?php
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

$query="INSERT INTO Suppliers (Name,TypeOfProductsSupplied) VALUES ('".$_POST['sname']."','".$_POST['stype']."')";


mysql_query($query) or die("Sorry,Something went wrong!");

mysql_close();
?>
<script>
for(i=0;i<suppliers.length;i++)
    document.write(i+":"+suppliers[i]+"<br>");
</script>
</body>
</html>