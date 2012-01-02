<?php
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

$query="INSERT INTO Customer (Name,PhoneNumber,Email,FaveID) VALUES ('".$_POST['CustomerName']."','".$_POST['Customer_PhoneNumber']."','".$_POST['Customer_Email']."','".$_POST['Customer_FaveID']."')";


mysql_query($query) or die("Sorry,Something went wrong!");

mysql_close();
?>