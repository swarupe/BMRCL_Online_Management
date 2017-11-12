DROP database if exists BMRCL_Data;

create database if not exists BMRCL_Data;

use BMRCL_Data;

create table CUSTOMER(Cust_Id int auto_increment primary key ,Address varchar(20),Phone_No varchar(10),Fname varchar(10),Lname varchar(10),Password varchar(20),Username varchar(20));

insert into CUSTOMER values(1,'Harohalli',9880012292,'Swaroop','E','swarup.e14','SwarupE');
insert into CUSTOMER values(2,'T.R.Nagar',8147088394,'Divya','Ramadas','divya23$','DivyaRB');
insert into CUSTOMER values(3,'Padhmanabh Nagar',9481588397,'Divya','B','divyaBSC','DivyaB');
insert into CUSTOMER values(4,'Frazer Town',8892583609,'Sajid','Khan','Sajidshowoff','SajidKhan');
insert into CUSTOMER values(5,'Padhmanabh Nagar',9902908189,'Chaitanya','N','chaitanyaBSC','ChaitanyaN');
insert into CUSTOMER values(6,'T.R.Nagar',9449567841,'Ramadas','Bhandari','<3dad<3','RamadasBhandari');
insert into CUSTOMER values(7,'Hegde',8151817105,'Jayanti','R','mymom?','JayantiR');

create table ADMIN(Admin_Id int auto_increment primary key,Admin_Name varchar(20),Age int,Sex char(1),Email varchar(50),Password varchar(20));

insert into ADMIN values(1,'Divya',19,'F','divyaramadas1998@gmail.com','divyaputta23$');
insert into ADMIN values(2,'Swarup',19,'M','swarup.e1998@gmail.com','swarup<3divya');

create table SMARTCARD(Card_No varchar(10) primary key,Balance decimal,Card_Status varchar(10),Cust_Id int,Admin_Id int, 
foreign key(Cust_Id) references CUSTOMER(Cust_Id) on delete cascade,
foreign key(Admin_Id) references ADMIN(Admin_Id) on delete cascade);

insert into SMARTCARD values(1234567890,150.0,'Issued',1,2);
insert into SMARTCARD values(9876543210,50.0,'Processing',2,1);
insert into SMARTCARD values(0987654321,100.0,'Pending',3,2);
insert into SMARTCARD values(1122334455,150.0,'Issued',4,1);
insert into SMARTCARD values(8147099394,500.0,'Issued',5,2);
insert into SMARTCARD values(9449567841,50.0,'Pending',6,1);
insert into SMARTCARD values(9880012292,150.0,'Processing',7,2);

create table ROUTE(Route_Id int auto_increment primary key,Route_Name varchar(20));

insert into ROUTE values(1,'Green Lane');
insert into ROUTE values(2,'Purple Lane');

create table TRAIN(Train_Id int auto_increment primary key,Capacity int,Admin_Id int,Route_Id int,
foreign key(Admin_Id) references ADMIN(Admin_Id) on delete cascade,
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade);

insert into TRAIN values(1,975,1,1);
insert into TRAIN values(2,975,2,1);

create table STATION(Station_Id varchar(5) primary key,Station_Name varchar(15),Route_Id int,
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade);

insert into STATION values('BSK','Banashankari',1);
insert into STATION values('KBS','Majestic',2);
insert into STATION values('JNR','Jayanagar',1);

create table COMPLAINT(Comp_Id int auto_increment primary key,Comp_Name varchar(10),Comp_Desc varchar(100),Comp_Status varchar(10),Admin_id int,
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
