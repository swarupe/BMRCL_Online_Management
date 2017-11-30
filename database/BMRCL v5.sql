DROP database if exists BMRCL_Data;

create database if not exists BMRCL_Data;

use BMRCL_Data;

create table CUSTOMER(Username varchar(20) primary key,Fname varchar(10),Lname varchar(10),Address varchar(20),Phone_No varchar(10),Password varchar(16));

insert into CUSTOMER values('SwarupE','Swaroop','E','Harohalli',9880012292,'swarup');
insert into CUSTOMER values('DivyaRB','Divya','Ramadas','T.R.Nagar',8147088394,'divya');
insert into CUSTOMER values('DivyaB','Divya','B','Padhmanabh Nagar',9481588397,'divyab');
insert into CUSTOMER values('SajidKhan','Sajid','Khan','Frazer Town',8892583609,'abcd');
insert into CUSTOMER values('ChaitanyaN','Chaitanya','N','Padhmanabh Nagar',9902908189,'chaitanya');
insert into CUSTOMER values('RamadasGB','Ramadas','Bhandari','T.R.Nagar',9449567841,'abcd123');
insert into CUSTOMER values('JayantiR','Jayanti','R','Hegde',8151817105,'abc007');

create table ADMIN(Admin_Id int primary key AUTO_INCREMENT,Admin_Name varchar(20),Age int,Sex char(1),Email varchar(30),Password varchar(16));

insert into ADMIN values(1,'Divya',19,'F','divyaramadas1998@gmail.com','divyaputta');
insert into ADMIN values(2,'Swarup',19,'M','swarup.e1998@gmail.com','swarup');

DELIMITER //
 
CREATE TRIGGER age_less_than_18 BEFORE INSERT ON admin
FOR EACH ROW
BEGIN
IF NEW.Age < 18 THEN
   SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = "Admins must be 18+";
END IF;
END;
//
DELIMITER ;


create table SMARTCARD(Card_No varchar(10) primary key,Balance decimal,Card_Status varchar(15) NOT NULL DEFAULT 'Pending',Username varchar(20),Admin_Id int, 
foreign key(Username) references CUSTOMER(Username) on delete cascade,
foreign key(Admin_Id) references ADMIN(Admin_Id));


insert into SMARTCARD values(1234567890,150.0,'Issued','SwarupE',2);
insert into SMARTCARD values(1876543210,50.0,'Processing','DivyaB',1);
insert into SMARTCARD values(1987654321,100.0,'Pending','SajidKhan',NULL);
insert into SMARTCARD values(1122334455,150.0,'Issued','RamadasGB',1);
insert into SMARTCARD values(1147088394,500.0,'Issued','DivyaRB',2);
insert into SMARTCARD values(1449567841,50.0,'Pending','ChaitanyaN',NULL);
insert into SMARTCARD values(1880012292,150.0,'Processing','JayantiR',2);



create table ROUTE(Route_Id int primary key,Route_Name varchar(35));

insert into ROUTE values(1,'Green Lane towards Nagasandra');
insert into ROUTE values(2,'Green Lane towards Yelachenahalli');
insert into ROUTE values(3,'Purple Lane towards Mysuru Road');
insert into ROUTE values(4,'Purple Lane towards Baiyyappanahalli');

create table STATION(Station_Name varchar(25),Route_Id int,
primary key(Station_Name,Route_Id));

insert into STATION values('Nagasandra',1);
insert into STATION values('Dasarahalli',1);
insert into STATION values('Jalahalli',1);
insert into STATION values('Peenya Industry',1);
insert into STATION values('Peenya',1);
insert into STATION values('Goraguntepalya',1);
insert into STATION values('Yeshwantpur',1);
insert into STATION values('Sandal Soap Factory',1);
insert into STATION values('Mahalaxmi',1);
insert into STATION values('Rajajinagar',1);
insert into STATION values('Kuvempu Road',1);
insert into STATION values('Shrirampura',1);
insert into STATION values('Sampige Road',1);
insert into STATION values('Majestic',1);
insert into STATION values('Chikpete',1);
insert into STATION values('K.R.Market',1);
insert into STATION values('National College',1);
insert into STATION values('Lalbagh',1);
insert into STATION values('South End Circle',1);
insert into STATION values('Jayanagar',1);
insert into STATION values('R.V.Road',1);
insert into STATION values('Banashankari',1);
insert into STATION values('Jayaprakash Nagar',1);
insert into STATION values('Yelachenahalli',1);
insert into STATION values('Mysuru Road',3);
insert into STATION values('Deepanjali Nagar',3);
insert into STATION values('Attiguppe',3);
insert into STATION values('Vijayanagar',3);
insert into STATION values('Hosahalli',3);
insert into STATION values('Magadi Road',3);
insert into STATION values('KSR Railway Station',3);
insert into STATION values('Majestic',3);
insert into STATION values('Sir M.V.Central College',3);
insert into STATION values('Vidhana Soudha',3);
insert into STATION values('Cubbon Park',3);
insert into STATION values('M.G.Road',3);
insert into STATION values('Trinity',3);
insert into STATION values('Ulsoor',3);
insert into STATION values('Indira Nagar',3);
insert into STATION values('S.V.Road',3);
insert into STATION values('Baiyyappanahalli',3);
insert into STATION values('Majestic',4);
insert into STATION values('Nagasandra',2);
insert into STATION values('Dasarahalli',2);
insert into STATION values('Jalahalli',2);
insert into STATION values('Peenya Industry',2);
insert into STATION values('Peenya',2);
insert into STATION values('Goraguntepalya',2);
insert into STATION values('Yeshwantpur',2);
insert into STATION values('Sandal Soap Factory',2);
insert into STATION values('Mahalaxmi',2);
insert into STATION values('Rajajinagar',2);
insert into STATION values('Kuvempu Road',2);
insert into STATION values('Shrirampura',2);
insert into STATION values('Sampige Road',2);
insert into STATION values('Majestic',2);
insert into STATION values('Chikpete',2);
insert into STATION values('K.R.Market',2);
insert into STATION values('National College',2);
insert into STATION values('Lalbagh',2);
insert into STATION values('South End Circle',2);
insert into STATION values('Jayanagar',2);
insert into STATION values('R.V.Road',2);
insert into STATION values('Banashankari',2);
insert into STATION values('Jayaprakash Nagar',2);
insert into STATION values('Yelachenahalli',2);
insert into STATION values('Mysuru Road',4);
insert into STATION values('Deepanjali Nagar',4);
insert into STATION values('Attiguppe',4);
insert into STATION values('Vijayanagar',4);
insert into STATION values('Hosahalli',4);
insert into STATION values('Magadi Road',4);
insert into STATION values('KSR Railway Station',4);

insert into STATION values('Sir M.V.Central College',4);
insert into STATION values('Vidhana Soudha',4);
insert into STATION values('Cubbon Park',4);
insert into STATION values('M.G.Road',4);
insert into STATION values('Trinity',4);
insert into STATION values('Ulsoor',4);
insert into STATION values('Indira Nagar',4);
insert into STATION values('S.V.Road',4);
insert into STATION values('Baiyyappanahalli',4);


create table TRAIN(Train_Id int primary key AUTO_INCREMENT,Admin_Id int,Route_Id int,
foreign key(Admin_Id) references ADMIN(Admin_Id),
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade);

insert into TRAIN values(1,1,1);
insert into TRAIN values(5,1,1);
insert into TRAIN values(2,2,2);
insert into TRAIN values(6,2,2);
insert into TRAIN values(3,2,3);
insert into TRAIN values(7,2,3);
insert into TRAIN values(4,1,4);
insert into TRAIN values(8,1,4);

create table COMPLAINT(Comp_Id int primary key AUTO_INCREMENT,Comp_Subject varchar(50),Comp_Desc varchar(500),Comp_Status varchar(20) NOT NULL DEFAULT 'Not_Replied',Username varchar(20),
foreign key(Username) references CUSTOMER(Username));

insert into COMPLAINT values(1,'ABC','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Not_Replied','SwarupE');
insert into COMPLAINT values(2,'ABCD','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Replied','DivyaRB');
insert into COMPLAINT values(3,'XYZ','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Not_Replied','DivyaB');
insert into COMPLAINT values(4,'AVBC','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Not_Replied','SajidKhan');
insert into COMPLAINT values(5,'ABCB','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Replied','ChaitanyaN');
insert into COMPLAINT values(6,'ABCD','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Replied','DivyaB');
insert into COMPLAINT values(7,'ABCD','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Replied','RamadasGB');
insert into COMPLAINT values(8,'ABC','abcdefgdiueiwehsjdbueiowdnbkdkhfieroiecvjdjfueruroizm','Not_Replied','JayantiR');

create table EMAIL(Username varchar(30),Email varchar(20),
primary key(Username,Email),
foreign key(Username) references CUSTOMER(Username) on delete cascade);

insert into EMAIL values('SwarupE','swarup.e1998@gmail.com');
insert into EMAIL values('DivyaRB','divyaramadas1998@gmail.com');
insert into EMAIL values('DivyaB','divyab0000@gmail.com');
insert into EMAIL values('ChaitanyaN','chaitanyan1111@gmail.com');
insert into EMAIL values('SajidKhan','sajidkhan2222@gmail.com');
insert into EMAIL values('RamadasGB','ramadasgb@gmail.com');
insert into EMAIL values('JayantiR','jayantiramadas@gmail.com');

create table DISPLAY_STATUS(From_Station varchar(25),To_Station varchar(25),Arrival time,Departure time,Train_id int,
primary key(From_Station,To_Station,Train_Id),
foreign key(From_Station) references STATION(Station_Name) on delete cascade,
foreign key(To_Station) references STATION(Station_Name) ,
foreign key(Train_Id) references TRAIN(Train_Id) on delete cascade);

insert into DISPLAY_STATUS values('Nagasandra','Dasarahalli','05:00','05:05',2);
insert into DISPLAY_STATUS values('Dasarahalli','Jalahalli','05:05','05:10',2);
insert into DISPLAY_STATUS values('Jalahalli','Peenya Industry','05:10','05:15',2);
insert into DISPLAY_STATUS values('Peenya Industry','Peenya','05:15','05:20',2);
insert into DISPLAY_STATUS values('Peenya','Goraguntepalya','05:15','05:20',2);
insert into DISPLAY_STATUS values('Goraguntepalya','Yeshwantpur','05:20','05:25',2);
insert into DISPLAY_STATUS values('Yeshwantpur','Sandal Soap Factory','05:25','05:30',2);
insert into DISPLAY_STATUS values('Sandal Soap Factory','Mahalaxmi','05:30','05:35',2);
insert into DISPLAY_STATUS values('Mahalaxmi','Rajajinagar','05:35','05:40',2);
insert into DISPLAY_STATUS values('Rajajinagar','Kuvempu Road','05:40','05:45',2);
insert into DISPLAY_STATUS values('Kuvempu Road','Shrirampura','05:45','05:50',2);
insert into DISPLAY_STATUS values('Shrirampura','Sampige Road','05:50','05:55',2);
insert into DISPLAY_STATUS values('Sampige Road','Majestic','05:55','06:00',2);
insert into DISPLAY_STATUS values('Majestic','Chikpete','06:00','06:05',2);
insert into DISPLAY_STATUS values('Chikpete','K.R.Market','06:05','06:10',2);
insert into DISPLAY_STATUS values('K.R.Market','National College','06:10','06:15',2);
insert into DISPLAY_STATUS values('National College','Lalbagh','06:15','06:20',2);
insert into DISPLAY_STATUS values('Lalbagh','South End Circle','06:20','06:25',2);
insert into DISPLAY_STATUS values('South End Circle','Jayanagar','06:25','06:30',2);
insert into DISPLAY_STATUS values('Jayanagar','R.V.Road','06:30','06:35',2);
insert into DISPLAY_STATUS values('R.V.Road','Banashankari','06:35','06:40',2);
insert into DISPLAY_STATUS values('Banashankari','Jayaprakash Nagar','06:40','06:45',2);
insert into DISPLAY_STATUS values('Jayaprakash Nagar','Yelachenahalli','06:45','06:50',2);

insert into DISPLAY_STATUS values('Yelachenahalli','Jayaprakash Nagar','06:50','06:55',1);
insert into DISPLAY_STATUS values('Jayaprakash Nagar','Banashankari','06:55','07:00',1);
insert into DISPLAY_STATUS values('Banashankari','R.V.Road','07:00','07:05',1);
insert into DISPLAY_STATUS values('R.V.Road','Jayanagar','07:05','07:10',1);
insert into DISPLAY_STATUS values('Jayanagar','South End Circle','07:10','07:15',1);
insert into DISPLAY_STATUS values('South End Circle','Lalbagh','07:15','07:20',1);
insert into DISPLAY_STATUS values('Lalbagh','National College','07:20','07:25',1);
insert into DISPLAY_STATUS values('National College','K.R.Market','07:25','07:30',1);
insert into DISPLAY_STATUS values('K.R.Market','Chikpete','07:30','07:35',1);
insert into DISPLAY_STATUS values('Chikpete','Majestic','07:35','07:40',1);
insert into DISPLAY_STATUS values('Majestic','Sampige Road','07:40','07:45',1);
insert into DISPLAY_STATUS values('Sampige Road','Shrirampura','07:45','07:50',1);
insert into DISPLAY_STATUS values('Shrirampura','Kuvempu Road','07:50','07:55',1);
insert into DISPLAY_STATUS values('Kuvempu Road','Rajajinagar','07:55','08:00',1);
insert into DISPLAY_STATUS values('Rajajinagar','Mahalaxmi','08:00','08:05',1);
insert into DISPLAY_STATUS values('Mahalaxmi','Sandal Soap Factory','08:05','08:10',1);
insert into DISPLAY_STATUS values('Sandal Soap Factory','Yeshwantpur','08:10','08:15',1);
insert into DISPLAY_STATUS values('Yeshwantpur','Goraguntepalya','08:15','08:20',1);
insert into DISPLAY_STATUS values('Goraguntepalya','Peenya','08:20','08:25',1);
insert into DISPLAY_STATUS values('Peenya','Peenya Industry','08:25','08:30',1);
insert into DISPLAY_STATUS values('Peenya Industry','Jalahalli','08:30','08:35',1);
insert into DISPLAY_STATUS values('Jalahalli','Dasarahalli','08:35','08:40',1);
insert into DISPLAY_STATUS values('Dasarahalli','Nagasandra','08:40','08:45',1);


insert into DISPLAY_STATUS values('Nagasandra','Dasarahalli','08:45','08:50',6);
insert into DISPLAY_STATUS values('Dasarahalli','Jalahalli','08:50','08:55',6);
insert into DISPLAY_STATUS values('Jalahalli','Peenya Industry','08:55','09:00',6);
insert into DISPLAY_STATUS values('Peenya Industry','Peenya','09:00','09:05',6);
insert into DISPLAY_STATUS values('Peenya','Goraguntepalya','09:05','09:10',6);
insert into DISPLAY_STATUS values('Goraguntepalya','Yeshwantpur','09:10','09:15',6);
insert into DISPLAY_STATUS values('Yeshwantpur','Sandal Soap Factory','09:15','09:20',6);
insert into DISPLAY_STATUS values('Sandal Soap Factory','Mahalaxmi','09:20','09:25',6);
insert into DISPLAY_STATUS values('Mahalaxmi','Rajajinagar','09:25','09:30',6);
insert into DISPLAY_STATUS values('Rajajinagar','Kuvempu Road','09:30','09:35',6);
insert into DISPLAY_STATUS values('Kuvempu Road','Shrirampura','09:35','09:40',6);
insert into DISPLAY_STATUS values('Shrirampura','Sampige Road','09:40','09:45',6);
insert into DISPLAY_STATUS values('Sampige Road','Majestic','09:45','09:50',6);
insert into DISPLAY_STATUS values('Majestic','Chikpete','09:50','09:55',6);
insert into DISPLAY_STATUS values('Chikpete','K.R.Market','09:55','10:00',6);
insert into DISPLAY_STATUS values('K.R.Market','National College','10:00','10:05',6);
insert into DISPLAY_STATUS values('National College','Lalbagh','10:05','10:10',6);
insert into DISPLAY_STATUS values('Lalbagh','South End Circle','10:10','10:15',6);
insert into DISPLAY_STATUS values('South End Circle','Jayanagar','10:15','10:20',6);
insert into DISPLAY_STATUS values('Jayanagar','R.V.Road','10:20','10:25',6);
insert into DISPLAY_STATUS values('R.V.Road','Banashankari','10:25','10:30',6);
insert into DISPLAY_STATUS values('Banashankari','Jayaprakash Nagar','10:30','10:35',6);
insert into DISPLAY_STATUS values('Jayaprakash Nagar','Yelachenahalli','10:35','10:40',6);

insert into DISPLAY_STATUS values('Yelachenahalli','Jayaprakash Nagar','10:40','10:45',5);
insert into DISPLAY_STATUS values('Jayaprakash Nagar','Banashankari','10:45','10:50',5);
insert into DISPLAY_STATUS values('Banashankari','R.V.Road','10:50','10:55',5);
insert into DISPLAY_STATUS values('R.V.Road','Jayanagar','10:55','11:00',5);
insert into DISPLAY_STATUS values('Jayanagar','South End Circle','11:00','11:05',5);
insert into DISPLAY_STATUS values('South End Circle','Lalbagh','11:05','11:10',5);
insert into DISPLAY_STATUS values('Lalbagh','National College','11:10','11:15',5);
insert into DISPLAY_STATUS values('National College','K.R.Market','11:15','11:20',5);
insert into DISPLAY_STATUS values('K.R.Market','Chikpete','11:20','11:25',5);
insert into DISPLAY_STATUS values('Chikpete','Majestic','11:25','11:30',5);
insert into DISPLAY_STATUS values('Majestic','Sampige Road','11:30','11:35',5);
insert into DISPLAY_STATUS values('Sampige Road','Shrirampura','11:35','11:40',5);
insert into DISPLAY_STATUS values('Shrirampura','Kuvempu Road','11:40','11:45',5);
insert into DISPLAY_STATUS values('Kuvempu Road','Rajajinagar','11:45','11:50',5);
insert into DISPLAY_STATUS values('Rajajinagar','Mahalaxmi','11:50','11:55',5);
insert into DISPLAY_STATUS values('Mahalaxmi','Sandal Soap Factory','11:55','12:00',5);
insert into DISPLAY_STATUS values('Sandal Soap Factory','Yeshwantpur','12:00','12:05',5);
insert into DISPLAY_STATUS values('Yeshwantpur','Goraguntepalya','12:05','12:10',5);
insert into DISPLAY_STATUS values('Goraguntepalya','Peenya','12:10','12:15',5);
insert into DISPLAY_STATUS values('Peenya','Peenya Industry','12:15','12:20',5);
insert into DISPLAY_STATUS values('Peenya Industry','Jalahalli','12:20','12:25',5);
insert into DISPLAY_STATUS values('Jalahalli','Dasarahalli','12:25','12:30',5);
insert into DISPLAY_STATUS values('Dasarahalli','Nagasandra','12:30','12:35',5);

insert into DISPLAY_STATUS values('Mysuru Road','Deepanjali Nagar','05:00','05:05',4);
insert into DISPLAY_STATUS values('Deepanjali Nagar','Attiguppe','05:05','05:10',4);
insert into DISPLAY_STATUS values('Attiguppe','Vijayanagar','05:10','05:15',4);
insert into DISPLAY_STATUS values('Vijayanagar','Hosahalli','05:15','05:20',4);
insert into DISPLAY_STATUS values('Hosahalli','Magadi Road','05:20','05:25',4);
insert into DISPLAY_STATUS values('Magadi Road','KSR Railway Station','05:25','05:30',4);
insert into DISPLAY_STATUS values('KSR Railway Station','Majestic','05:30','05:35',4);
insert into DISPLAY_STATUS values('Majestic','Sir M.V.Central College','05:35','05:40',4);
insert into DISPLAY_STATUS values('Sir M.V.Central College','Vidhana Soudha','05:40','05:45',4);
insert into DISPLAY_STATUS values('Vidhana Soudha','Cubbon Park','05:45','05:50',4);
insert into DISPLAY_STATUS values('Cubbon Park','M.G.Road','05:50','05:55',4);
insert into DISPLAY_STATUS values('M.G.Road','Trinity','05:55','06:00',4);
insert into DISPLAY_STATUS values('Trinity','Ulsoor','06:00','06:05',4);
insert into DISPLAY_STATUS values('Ulsoor','Indira Nagar','06:05','06:10',4);
insert into DISPLAY_STATUS values('Indira Nagar','S.V.Road','06:10','06:15',4);
insert into DISPLAY_STATUS values('S.V.Road','Baiyyappanahalli','06:15','06:20',4);

insert into DISPLAY_STATUS values('Baiyyappanahalli','S.V.Road','06:20','06:25',3);
insert into DISPLAY_STATUS values('S.V.Road','Indira Nagar','06:25','06:30',3);
insert into DISPLAY_STATUS values('Indira Nagar','Ulsoor','06:30','06:35',3);
insert into DISPLAY_STATUS values('Ulsoor','Trinity','06:35','06:40',3);
insert into DISPLAY_STATUS values('Trinity','M.G.Road','06:40','06:45',3);
insert into DISPLAY_STATUS values('M.G.Road','Cubbon Park','06:45','06:50',3);
insert into DISPLAY_STATUS values('Cubbon Park','Vidhana Soudha','06:50','06:55',3);
insert into DISPLAY_STATUS values('Vidhana Soudha','Sir M.V.Central College','06:55','07:00',3);
insert into DISPLAY_STATUS values('Sir M.V.Central College','Majestic','07:00','07:05',3);
insert into DISPLAY_STATUS values('Majestic','KSR Railway Station','07:05','07:10',3);
insert into DISPLAY_STATUS values('KSR Railway Station','Magadi Road','07:10','07:15',3);
insert into DISPLAY_STATUS values('Magadi Road','Hosahalli','07:15','07:20',3);
insert into DISPLAY_STATUS values('Hosahalli','Vijayanagar','07:20','07:25',3);
insert into DISPLAY_STATUS values('Vijayanagar','Attiguppe','07:25','07:30',3);
insert into DISPLAY_STATUS values('Attiguppe','Deepanjali Nagar','07:30','07:35',3);
insert into DISPLAY_STATUS values('Deepanjali Nagar','Mysuru Road','07:35','07:40',3);

insert into DISPLAY_STATUS values('Mysuru Road','Deepanjali Nagar','07:50','07:55',8);
insert into DISPLAY_STATUS values('Deepanjali Nagar','Attiguppe','07:55','08:00',8);
insert into DISPLAY_STATUS values('Attiguppe','Vijayanagar','08:00','08:05',8);
insert into DISPLAY_STATUS values('Vijayanagar','Hosahalli','08:05','08:10',8);
insert into DISPLAY_STATUS values('Hosahalli','Magadi Road','08:10','08:15',8);
insert into DISPLAY_STATUS values('Magadi Road','KSR Railway Station','08:15','08:20',8);
insert into DISPLAY_STATUS values('KSR Railway Station','Majestic','08:20','08:25',8);
insert into DISPLAY_STATUS values('Majestic','Sir M.V.Central College','08:25','08:30',8);
insert into DISPLAY_STATUS values('Sir M.V.Central College','Vidhana Soudha','08:30','08:35',8);
insert into DISPLAY_STATUS values('Vidhana Soudha','Cubbon Park','08:35','08:40',8);
insert into DISPLAY_STATUS values('Cubbon Park','M.G.Road','08:40','08:45',8);
insert into DISPLAY_STATUS values('M.G.Road','Trinity','08:45','08:50',8);
insert into DISPLAY_STATUS values('Trinity','Ulsoor','08:50','08:55',8);
insert into DISPLAY_STATUS values('Ulsoor','Indira Nagar','08:55','09:00',8);
insert into DISPLAY_STATUS values('Indira Nagar','S.V.Road','09:00','09:15',8);
insert into DISPLAY_STATUS values('S.V.Road','Baiyyappanahalli','09:15','09:20',8);

insert into DISPLAY_STATUS values('Baiyyappanahalli','S.V.Road','09:20','09:25',7);
insert into DISPLAY_STATUS values('S.V.Road','Indira Nagar','09:25','09:30',7);
insert into DISPLAY_STATUS values('Indira Nagar','Ulsoor','09:30','09:35',7);
insert into DISPLAY_STATUS values('Ulsoor','Trinity','09:35','09:40',7);
insert into DISPLAY_STATUS values('Trinity','M.G.Road','09:40','09:45',7);
insert into DISPLAY_STATUS values('M.G.Road','Cubbon Park','09:45','09:50',7);
insert into DISPLAY_STATUS values('Cubbon Park','Vidhana Soudha','09:50','09:55',7);
insert into DISPLAY_STATUS values('Vidhana Soudha','Sir M.V.Central College','09:55','10:00',7);
insert into DISPLAY_STATUS values('Sir M.V.Central College','Majestic','10:00','10:05',7);
insert into DISPLAY_STATUS values('Majestic','KSR Railway Station','10:05','10:10',7);
insert into DISPLAY_STATUS values('KSR Railway Station','Magadi Road','10:10','10:15',7);
insert into DISPLAY_STATUS values('Magadi Road','Hosahalli','10:15','10:20',7);
insert into DISPLAY_STATUS values('Hosahalli','Vijayanagar','10:20','10:25',7);
insert into DISPLAY_STATUS values('Vijayanagar','Attiguppe','10:25','10:30',7);
insert into DISPLAY_STATUS values('Attiguppe','Deepanjali Nagar','10:30','10:35',7);
insert into DISPLAY_STATUS values('Deepanjali Nagar','Mysuru Road','10:35','10:40',7);

create table REPLY(Reply_Id int AUTO_INCREMENT, ReplyMessage varchar(500),Admin_Id int,Comp_Id int,
primary key(Reply_Id,Admin_Id,Comp_Id),
foreign key(Comp_Id) references COMPLAINT(Comp_Id) on delete cascade,
foreign key(Admin_Id) references ADMIN(Admin_Id));

insert into REPLY values(1,'svxuusgdwdpwyehfihngcdytc8bsdgytwyrwsdjbsygft7r9w8sjddyudfrdfhesgfhuiyr7w567wefgdfhf',2,2);
insert into REPLY values(2,'duhsahdiuriuesyrfiusgaijhf',2,5);
insert into REPLY values(3,'sjdhsfcuegcfgsbcbsjadnwiqe0qiurfuefhdbnvsjankdjaoiidio',1,6);
insert into REPLY values(4,'sbhsdfesfgushcdvhvhdhshdfeisuoeurhdsbvdhsgsfuisudjd',1,7);


DELIMITER //
CREATE PROCEDURE recharge(IN amount decimal (10,0), IN cardno varchar(10))

BEGIN
START TRANSACTION;
	UPDATE smartcard 
	SET Balance = Balance + amount
	WHERE Card_No = cardno;
    
     
    SELECT Balance 
    FROM smartcard 
    WHERE Card_No = cardno;
    
   COMMIT;
END //

DELIMITER ;




DELIMITER //
CREATE PROCEDURE train_details(IN RouteName varchar(35),IN From_addr varchar(25), IN To_addr varchar(25))

BEGIN
 SELECT T.Train_Id, D1.From_Station, D1.Arrival AS Source_Arrival, D1.Departure AS Source_Departure, D2.To_Station, D2.Arrival AS Dest_Arrival, D2.Departure AS Dest_Departure
  FROM display_status D1, train T, route R, display_status D2  
  WHERE T.Train_Id=D1.Train_id AND T.Train_Id =D2.Train_id 
  	AND R.Route_Id = T.Route_Id  
  	AND R.Route_Name = RouteName 
  	AND D1.From_Station =  From_addr 
    AND D2.To_Station = To_addr;
END //

DELIMITER ;
