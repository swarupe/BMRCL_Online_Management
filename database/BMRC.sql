create database BMRCL_Data;

use BMRCL_Data;

create table CUSTOMER(Cust_Id int primary key,Address varchar(20),Phone_No varchar(10),Fname varchar(10),Lname varchar(10));

create table ADMIN(Admin_Id int primary key,Age int,Sex char(1),Email varchar(50),Password varchar(10));

create table SMARTCARD(Card_No varchar(10) primary key,Balance decimal,Card_Status varchar(10),Cust_Id int,Admin_Id int, 
foreign key(Cust_Id) references CUSTOMER(Cust_Id) on delete cascade,
foreign key(Admin_Id) references ADMIN(Admin_Id) on delete cascade);

create table ROUTE(Route_Id int primary key);

create table TRAIN(Train_Id int primary key,Capacity int,Admin_Id int,Route_Id int,
foreign key(Admin_Id) references ADMIN(Admin_Id) on delete cascade,
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade);

create table STATION(Station_Id varchar(5) primary key,Station_Name varchar(15),Route_Id int,
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade);

create table COMPLAINT(Comp_Id int primary key, Comp_Name varchar(10),Comp_Desc varchar(100),Comp_Status varchar(10),Admin_id int,
foreign key(Admin_Id) references ADMIN(Admin_Id) on delete cascade);

create table REGISTER_COMPLAINT(Comp_Name varchar(10),Cust_Id int,
primary key(Comp_Name,Cust_Id),
foreign key(Cust_Id) references CUSTOMER(Cust_Id) on delete cascade,
foreign key(Comp_Name) references COMPLAINT(Comp_Name) on delete cascade);

create table EMAIL(Cust_Id int,Email varchar(50),
primary key(Cust_Id,Email),
foreign key(Cust_Id) references CUSTOMER(Cust_Id) on delete cascade);

create table DISPLAY_STATUS(Station_Id varchar(5),Train_id int,Arrival time,Departure time,
primary key(Station_Id,Train_Id),
foreign key(Station_Id) references STATION(Station_Id) on delete cascade,
foreign key(Train_Id) references TRAIN(Train_Id) on delete cascade);
