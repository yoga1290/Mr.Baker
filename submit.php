<html>
<head>
<title>Mr.Baker!</title>
</head>
<body>
<?php
mysql_connect('fdb2.awardspace.com','yoga1290_project','yoga1290');
@mysql_select_db('yoga1290_project') or die(mysql_error());

// The STEPS SUMMARY:

//IF idSuppliers isn't given , INSERT a new Supplier
//IF idProducts isn't given , INSERT a new Product
//IF idCustomer isn't given , INSERT a new Customer
//IF idEmployee isn't given , INSERT a new Employee
//...If everything is given (or INSERTed into the DB),use the IDs to form a new Order


//INSERT INTO Suppliers

$Suppliers_idSuppliers=-1;
if (isset($_POST["Suppliers_idSuppliers"]))
 $Suppliers_idSuppliers=$_POST["Suppliers_idSuppliers"];
else if(isset($_POST["Suppliers_Name"]))
{
   $query="INSERT INTO Suppliers (Name,TypeOfProductsSupplied) VALUES ('".$_POST["Suppliers_Name"]."','".$_POST["Suppliers_TypeOfProductsSupplied"]."')";
   
   mysql_query($query) or die(mysql_error());
   
   $idQuery = mysql_query('SELECT COUNT(*) FROM Suppliers') or die(mysql_error());
   
   $Suppliers_idSuppliers = mysql_result($idQuery, 0)+1;
   
   echo $query."<br>";
}



//INSERT INTO Products


$Products_idProducts=-1;
if (isset($_POST["Products_idProducts"]))
{
  $Products_idProducts=$_POST["Products_idProducts"];
	if( isset($_POST["Products_NumberInStock"]) )
		mysql_query("UPDATE Products SET NumberInStock=".$_POST["Products_NumberInStock"]."   WHERE idProducts=".$Products_idProducts) or die(mysql_error());
}
else if(isset($_POST["Products_Name"]))
{
// $Suppliers_idSuppliers is REQUIRED

  $query="INSERT INTO Products (Name,Price,NumberInStock,Type,SuppID) VALUES ('".$_POST["Products_Name"]."','".$_POST["Products_Price"]."','".$_POST["Products_NumberInStock"]."','".$_POST["Products_Type"]."','".$Suppliers_idSuppliers."')";

  mysql_query($query) or die(mysql_error());
  $idQuery = mysql_query('SELECT COUNT(*) FROM Products') or die(mysql_error());
  
  $Products_idProducts = mysql_result($idQuery, 0)+1;
  echo $query."<br>";
}


//INSERT INTO Customer


$Customer_idCustomer=-1;
if (isset($_POST["Customer_idCustomer"]))
 $Customer_idCustomer=$_POST["Customer_idCustomer"];
else if(isset($_POST["Customer_Name"]))
{

//Assuming that, FaveID=$Products_idProducts

 $query="INSERT INTO Customer (Name,Price,PhoneNumber,Type,Email,FaveID) VALUES ('".$_POST["Customer_Name"]."','".$_POST["Customer_PhoneNumber"]."','".$_POST["Customer_Email"]."','"+$Products_idProducts+"')";
 
  mysql_query($query) or die(mysql_error());
  $idQuery = mysql_query('SELECT COUNT(*) FROM Customer') or die(mysql_error());
  
  $Customer_idCustomer = mysql_result($idQuery, 0)+1;
  
  echo $query."<br>";
}



//INSERT INTO Employee 


$Employee_idEmployee=-1;
if (isset($_POST["Employee_idEmployee"]))
 $Employee_idEmployee=$_POST["Employee_idEmployee"];
else if(isset($_POST["Employee_Name"]))
{
//FaveID=$Products_idProducts

 $query="INSERT INTO Employee (Name,PhoneNumber,Email,SalCategory,Position) VALUES ('".$_POST["Employee_Name"]."','".$_POST["Employee_PhoneNumber"]."','".$_POST["Employee_Email"]."','".$_POST["Employee_SalCategory"]."','".$_POST["Employee_Position"]."')";
 
  mysql_query($query) or die(mysql_error());
  $idQuery = mysql_query('SELECT COUNT(*) FROM Employee') or die(mysql_error());
  
  $Employee_idEmployee = mysql_result($idQuery, 0)+1;
  
  echo $query."<br>";
}



//INSERT INTO Delivery

$Delivery_idDelivery=-1;
if (isset($_POST["Delivery_idDelivery"])) //I think this is useless check,but,wouldn't harm,anyway :P
 $Delivery_idDelivery=$_POST["Delivery_idDelivery"];
else if(isset($_POST["Employee_Name"]))
{
    if(strtotime(date("Y-m-d")) > strtotime( date("Y")."-".$_POST["sel_date_month"]."-".$_POST["sel_date_day"]) )
        $query="INSERT INTO Delivery (Date) VALUES ('".date("Y")."-".$_POST["sel_date_month"]."-".$_POST["sel_date_day"]."')";
    else
        if(strtotime(date("Y-m-d")) > strtotime( (date("Y")+1)."-".$_POST["sel_date_month"]."-".$_POST["sel_date_day"]) )
        $query="INSERT INTO Delivery (Date) VALUES ('".date("Y")."-".$_POST["sel_date_month"]."-".$_POST["sel_date_day"]."')";
 
  mysql_query($query) or die(mysql_error());
  
  $idQuery = mysql_query('SELECT COUNT(*) FROM Delivery') or die(mysql_error());
  $Delivery_idDelivery = mysql_result($idQuery, 0)+1;
  
  echo $query."<br>";
}


//INSERT INTO Orders


if( $Delivery_idDelivery!=-1    &&
    $Products_idProducts!=-1    &&
    $Customer_idCustomer!=-1    &&
    $Employee_idEmployee!=-1
    )
{
 $query="INSERT INTO Orders (DelID,ProdID,CustID,EmpID) VALUES (".$Delivery_idDelivery.",".$Products_idProducts.",".$Customer_idCustomer.",".$Employee_idEmployee.")";
 mysql_query($query) or die(mysql_error());
 
 echo $query."<br>";
}

echo "Done";

mysql_close();
?>
</body>
</html>