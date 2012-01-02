-- -----------------------------------------------------
-- Table `Employee`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Employee` (
  `idEmployee` INT NOT NULL ,
  `Name` VARCHAR(45) NULL ,
  `PhoneNumber` VARCHAR(45) NULL ,
  `Email` VARCHAR(45) NULL ,
  `SalCategory` VARCHAR(45) NULL ,
  `Position` VARCHAR(45) NULL ,
  PRIMARY KEY (`idEmployee`) ,
  INDEX `idEmployee` (`idEmployee` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suppliers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suppliers` (
  `idSuppliers` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NULL ,
  `TypeOfProductsSupplied` VARCHAR(45) NULL ,
  PRIMARY KEY (`idSuppliers`) ,
  INDEX `idSuppliers` (`idSuppliers` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Products` (
  `idProducts` INT NOT NULL ,
  `Name` VARCHAR(45) NOT NULL ,
  `Price` VARCHAR(45) NOT NULL ,
  `NumberInStock` INT NOT NULL ,
  `Type` VARCHAR(45) NOT NULL ,
  `SuppID` INT NOT NULL ,
  PRIMARY KEY (`idProducts`) ,
  INDEX `idSuppliers` (`SuppID` ASC) ,
  INDEX `idProducts` (`idProducts` ASC) ,
  CONSTRAINT `idSuppliers`
    FOREIGN KEY (`SuppID` )
    REFERENCES `Suppliers` (`idSuppliers` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Customer` (
  `idCustomer` INT NOT NULL ,
  `Name` VARCHAR(45) NOT NULL ,
  `PhoneNumber` VARCHAR(45) NOT NULL ,
  `FaveID` INT NOT NULL ,
  `Email` VARCHAR(45) NULL ,
  PRIMARY KEY (`idCustomer`) ,
  INDEX `idProducts` (`FaveID` ASC) ,
  CONSTRAINT `idProducts`
    FOREIGN KEY (`FaveID` )
    REFERENCES `Products` (`idProducts` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Delivery`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Delivery` (
  `idDelivery` INT NOT NULL ,
  `Date` DATE NULL ,
  PRIMARY KEY (`idDelivery`) ,
  INDEX `idDelivery` (`idDelivery` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Orders` (
  `DelID` INT NOT NULL ,
  `ProdID` INT NOT NULL ,
  `CustID` INT NOT NULL ,
  `EmpID` INT NOT NULL ,
  INDEX `idDelivery` (`DelID` ASC) ,
  INDEX `idCustomer` (`CustID` ASC) ,
  INDEX `idProducts` (`ProdID` ASC) ,
  PRIMARY KEY (`DelID`, `ProdID`, `CustID`, `EmpID`) ,
  INDEX `idEmp` (`EmpID` ASC) ,
  CONSTRAINT `idDelivery`
    FOREIGN KEY (`DelID` )
    REFERENCES `Delivery` (`idDelivery` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCustomer`
    FOREIGN KEY (`CustID` )
    REFERENCES `Customer` (`idCustomer` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idProducts`
    FOREIGN KEY (`ProdID` )
    REFERENCES `Products` (`idProducts` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEmp`
    FOREIGN KEY (`EmpID` )
    REFERENCES `Employee` (`idEmployee` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
