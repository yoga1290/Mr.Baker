<?php
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die( "Unable to select database");

$Suppliers_idSuppliers=-1;
if (isset($_POST['Suppliers_idSuppliers']))
 $Suppliers_idSuppliers=$_POST['Suppliers_idSuppliers'];
else
{
   $query="INSERT INTO Suppliers (Name,TypeOfProductsSupplied) VALUES ('".$_POST['Suppliers_Name']."','".$_POST['Suppliers_Type']."')";
   mysql_query($query) or die("Sorry,Something went wrong!");
// $Suppliers_idSuppliers =this brand new ID
}



$Products_idProducts=-1;
if (isset($_POST['Products_idProducts']))
  $Products_idProducts=$_POST['Products_idProducts'];
// Else If : Supplying this product
else
{
// $Suppliers_idSuppliers is REQUIRED
  $query="INSERT INTO Products (Name,Price,NumberInStock,Type,SuppID) VALUES ('".$_POST['Products_Name']."','".$_POST['Products_Price']."','".$_POST['Products_NumberInStock']."','".$_POST['Products_Type']."','".$Suppliers_idSuppliers."')";
  //mysql_query($query) or die("Sorry,Something went wrong!");
 // Products_Name,Products_Price,Products_NumberInStock,Products_Type,Products_Supplier_Name

//$Products_idProducts= this brand new ID;
}



$Customer_idCustomer=-1;
if (isset($_POST['Customer_idCustomer']))
 $Customer_idCustomer=$_POST['Customer_idCustomer'];
else
{
//FavID=$Products_idProducts
 $query="INSERT INTO Customer (Name,Price,PhoneNumber,Type,Email) VALUES ('".$_POST['Customer_Name']."','".$_POST['Customer_PhoneNumber']."','".$_POST['Customer_Email']."')";
  //mysql_query($query) or die("Sorry,Something went wrong!");
  //$Customer_idCustomer=this brand new ID;
}
//is Customer_idCustomer set:
//Customer_Name,Customer_PhoneNumber,Customer_Email




//Order



//Delevery

mysql_close();
?>