#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Marital_Status
#------------------------------------------------------------

CREATE TABLE Marital_Status(
        id     Int  Auto_increment  NOT NULL ,
        status Varchar (10) NOT NULL
	,CONSTRAINT Marital_Status_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client
#------------------------------------------------------------

CREATE TABLE Client(
        id                Int  Auto_increment  NOT NULL ,
        lastname          Varchar (50) NOT NULL ,
        firstname         Varchar (50) NOT NULL ,
        birthdate         Date NOT NULL ,
        address           Text NOT NULL ,
        zipcode           Varchar (5) NOT NULL ,
        phone             Varchar (10) NOT NULL ,
        id_Marital_Status Int NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (id)

	,CONSTRAINT Client_Marital_Status_FK FOREIGN KEY (id_Marital_Status) REFERENCES Marital_Status(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Credit
#------------------------------------------------------------

CREATE TABLE Credit(
        id        Int  Auto_increment  NOT NULL ,
        company   Varchar (50) NOT NULL ,
        sum       Float NOT NULL ,
        id_Client Int NOT NULL
	,CONSTRAINT Credit_PK PRIMARY KEY (id)

	,CONSTRAINT Credit_Client_FK FOREIGN KEY (id_Client) REFERENCES Client(id)
)ENGINE=InnoDB;

