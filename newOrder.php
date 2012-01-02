<?php
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

// IF $_POST['Suppliers_idSuppliers'] is Null/Empty:
$query="INSERT INTO Suppliers (Name,TypeOfProductsSupplied) VALUES ('".$_POST['Suppliers_Name']."','".S_POST['TypeOfProductsSupplied']."')";

mysql_query($query) or die("Sorry,Something went wrong!");

// requires Suppliers_idSuppliers
// IF $_POST['Products_idProducts'] is Null/Empty:
$query="INSERT INTO Products (Name,Price,NumberInStock,Type,SuppID) VALUES ('".$_POST['Suppliers_Name']."','".S_POST['TypeOfProductsSupplied']."')";

mysql_query($query) or die("Sorry,Something went wrong!");

mysql_close();
?>