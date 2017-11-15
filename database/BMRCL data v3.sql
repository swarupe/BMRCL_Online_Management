DROP database if exists BMRCL_Data;

create database if not exists BMRCL_Data;

use BMRCL_Data;

create table CUSTOMER(Username varchar(20) primary key,Fname varchar(10),Lname varchar(10),Address varchar(20),Phone_No varchar(10),Password varchar(20));

insert into CUSTOMER values('SwarupE','Swaroop','E','Harohalli',9880012292,'swarup');
insert into CUSTOMER values('DivyaRB','Divya','Ramadas','T.R.Nagar',8147088394,'divya');
insert into CUSTOMER values('DivyaB','Divya','B','Padhmanabh Nagar',9481588397,'divyab');
insert into CUSTOMER values('SajidKhan','Sajid','Khan','Frazer Town',8892583609,'abcd');
insert into CUSTOMER values('ChaitanyaN','Chaitanya','N','Padhmanabh Nagar',9902908189,'chaitanya');
insert into CUSTOMER values('RamadasBhandari','Ramadas','Bhandari','T.R.Nagar',9449567841,'abcd123');
insert into CUSTOMER values('JayantiR','Jayanti','R','Hegde',8151817105,'abc007');

create table ADMIN(Admin_Id int primary key AUTO_INCREMENT,Admin_Name varchar(20),Age int,Sex char(1),Email varchar(50),Password varchar(20));

insert into ADMIN values(1,'Divya',19,'F','divyaramadas1998@gmail.com','divyaputta');
insert into ADMIN values(2,'Swarup',19,'M','swarup.e1998@gmail.com','swarup');

DELIMITER //
 
CREATE TRIGGER age_less_than_18 BEFORE INSERT ON admin
FOR EACH ROW
BEGIN
IF NEW.Age < 18 THEN
   SET NEW.Age = 20;
END IF;
END;
//
DELIMITER ;


create table SMARTCARD(Card_No varchar(10) primary key,Balance decimal,Card_Status varchar(10),Cust_Id int,Admin_Id int, 
foreign key(Cust_Id) references CUSTOMER(Cust_Id) on delete cascade,
foreign key(Admin_Id) references ADMIN(Admin_Id));



insert into SMARTCARD values(1234567890,150.0,'Issued',1,2);
insert into SMARTCARD values(9876543210,50.0,'Processing',2,1);
insert into SMARTCARD values(0987654321,100.0,'Pending',3,2);
insert into SMARTCARD values(1122334455,150.0,'Issued',4,1);
insert into SMARTCARD values(8147099394,500.0,'Issued',5,2);
insert into SMARTCARD values(9449567841,50.0,'Pending',6,1);
insert into SMARTCARD values(9880012292,150.0,'Processing',7,2);

create table ROUTE(Route_Id int primary key AUTO_INCREMENT,Route_Name varchar(20));

insert into ROUTE values(1,'Green Lane');
insert into ROUTE values(2,'Purple Lane');

create table TRAIN(Train_Id int primary key AUTO_INCREMENT,Capacity int,Admin_Id int,Route_Id int,
foreign key(Admin_Id) references ADMIN(Admin_Id)on delete cascade,
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade);

insert into TRAIN values(1,975,1,1);
insert into TRAIN values(2,975,2,1);
insert into TRAIN values(3,975,2,2);
insert into TRAIN values(4,975,1,2);

create table STATION(Station_Name varchar(50) primary key,Route_Id int,
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade);

insert into STATION values('Nagasandra',1);
insert into STATION values('Dasarahalli',1);
insert into STATION values('Jalahalli',1);
insert into STATION values('PeenyaIndustry',1);
insert into STATION values('Peenya',1);
insert into STATION values('Goraguntepalya',1);
insert into STATION values('Yeshwantpur',1);
insert into STATION values('SandalSoapFactory',1);
insert into STATION values('Mahalaxmi',1);
insert into STATION values('Rajajinagar',1);
insert into STATION values('KuvempuRoad',1);
insert into STATION values('Shrirampura',1);
insert into STATION values('SampigeRoad',1);
insert into STATION values('Majestic',1);
insert into STATION values('Chikpete',1);
insert into STATION values('K.R.Market',1);
insert into STATION values('NationalCollege',1);
insert into STATION values('Lalbagh',1);
insert into STATION values('SouthEndCircle',1);
insert into STATION values('Jayanagar',1);
insert into STATION values('R.V.Road',1);
insert into STATION values('Banashankari',1);
insert into STATION values('JayaprakashNagar',1);
insert into STATION values('Yelachenahalli',1);
insert into STATION values('MysuruRoad',2);
insert into STATION values('DeepanjaliNagar',2);
insert into STATION values('Attiguppe',2);
insert into STATION values('Vijayanagar',2);
insert into STATION values('Hosahalli',2);
insert into STATION values('MagadiRoad',2);
insert into STATION values('KSRRailwayStation',2);
insert into STATION values('Majestic',2);
insert into STATION values('SirMVCentralCollege',2);
insert into STATION values('VidhanaSoudha',2);
insert into STATION values('CubbonPark',2);
insert into STATION values('M.G.Road',2);
insert into STATION values('Trinity',2);
insert into STATION values('Ulsoor',2);
insert into STATION values('Indiranagar',2);
insert into STATION values('SVRoad',2);
insert into STATION values('BaiyappanaHalli',2);


create table COMPLAINT(Comp_Id int primary key AUTO_INCREMENT,Comp_Name varchar(10),Comp_Desc varchar(100),Comp_Status varchar(10),Admin_id int,
foreign key(Admin_Id) references ADMIN(Admin_Id) on delete cascade);

insert into COMPLAINT values(1,'ABC','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Not_Replied',1);
insert into COMPLAINT values(2,'ABCD','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Replied',2);

create table REGISTER_COMPLAINT(Comp_Id int,Cust_Id int,
primary key(Comp_Id,Cust_Id),
foreign key(Cust_Id) references CUSTOMER(Cust_Id) on delete cascade,
foreign key(Comp_Id) references COMPLAINT(Comp_Id) on delete cascade);

insert into REGISTER_COMPLAINT values(1,1);
insert into REGISTER_COMPLAINT values(2,3);

create table EMAIL(Cust_Id int,Email varchar(50),
primary key(Cust_Id,Email),
foreign key(Cust_Id) references CUSTOMER(Cust_Id) on delete cascade);

insert into EMAIL values(1,'swarup.e1998@gmail.com');
insert into EMAIL values(2,'divyaramadas1998@gmail.com');

create table DISPLAY_STATUS(Station_Id varchar(5),Train_id int,Arrival time,Departure time,
primary key(Station_Id,Train_Id),
foreign key(Station_Id) references STATION(Station_Id) on delete cascade,
foreign key(Train_Id) references TRAIN(Train_Id) on delete cascade);

insert into DISPLAY_STATUS values('BSK',1,'15:05','15:10');
insert into DISPLAY_STATUS values('KBS',2,'11:00','11:05');
