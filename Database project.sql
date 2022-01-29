--***********************************************************************************************
Database project on bank system
set by : Daniel Asnakew
--*************************************************************************************************
    
--===================================================================================================
create database bank_system
use bank_system
create table BankEmployee(ssn varchar(50)not null,fullname varchar(60),
                          telephoneaddress int,position varchar(50),
                          salary float,birthdate varchar(50)
                          primary key (ssn));
                          
create table LoginAccount(officerloginname varchar(50),ssn varchar(50),
                          officerpassword varchar(10),officerrole varchar(50),
                          primary key (officerloginname),
                          foreign key (ssn) references BankEmployee(ssn));  
                                                 
create table BankCustomers(AccNo varchar(50),Accouttype varchar(50),custfullname varchar(50),
                          custgender varchar(5),custberthdate varchar(50),custcity varchar(50),
                          custkebele varchar(50),custofficephone Int,
                          custcellphone Integer,custproffesion varchar(50),
                          custmonthelyincome float,primary key(Accno));
                          
                            
                                                                                           
create table BankBranch(BranchNo varchar(50),BranchName varchar(50),
                        
                         CityName varchar(50),Location varchar(50),
                         primary key (BranchNo));
                         
create table BankBalance(Accno varchar(50),BranchNo varchar(50),
                         Balance float,primary key(Accno,BranchNo),
                        
                         foreign key (AccNo) references BankCustomers(Accno),
                         foreign key (BranchNo) references BankBranch(BranchNo)); 
                         
create table WithDrowal(WithDrowalAutoCode Int identity(1,1),AccNo varchar(50),
                        BranchNo varchar(50),AmountWithDrowal float,
                        ReasonWithDrowal varchar(50),WithDrowalDate varchar(50),
                        primary key(WithDrowalAutoCode),foreign key(AccNo)references BankCustomers,
                        foreign key (BranchNo)references BankBranch);   
                        
create table Deposite(DepositAutoCode Int identity(1,1), AccNo varchar(50),BranchNo varchar(50),
                     AmountDeposited float,DateDeposited varchar(50),
                     primary key(DepositAutoCode),foreign key(AccNo)references BankCustomers,
                     foreign key (BranchNo)references BankBranch); 
                     
            
--===================================================================================================
--QUESTION 2
--Inserting meaning full data
-- 2. Insert Meaning full data for customers and Organizations listed above 
--from T1 to T8(it is possible to insert additional data to make your 
--database information rich)
insert into BankEmployee values('s100','MULEKEN TADEL',092564738,'NURSE',4890.0,'3/02/1989');
insert into BankEmployee values('s101',' Getu ABERA',0913456347,'Progamer',4674.0,'17/05/1989');
insert into BankEmployee values('s102',' SAMUEL Yohanes',0922553634,'DOCTOR',55989.0,'27/10/1999');
insert into BankEmployee values('s103',' Asheber BELAY',0911770737,'FARMACIST',9999.0,'21/09/1998');
insert into BankEmployee values('s104','mgos girmachew ',0912678950,'casher',47760.8,'19/08/1984');
insert into BankEmployee values('s105',' SOLOMON Natenale ',0935467890,'DRIVER',3642.3,'12/09/1975');
insert into BankEmployee values('s106','mulugata Shegaw',0113342565,'vice manager',49087.6,'01/03/1980');
insert into BankEmployee values('s107','Birhanu Eniyew',016702345,'PRESIDENT',410000,'16/01/1986');
insert into BankEmployee values('s108','BIRTUKAN Dagnachew',0911000654,'MARKETING MANAGER',12657.0,'23/08/1990');
insert into BankEmployee values('s109','LEMELEM Kahun',0958990934,' manager',94676.5,'07/12/1967');
-----------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
insert into LoginAccount values('dawit yeshitila','s105','ad1234','Acountant');
insert into LoginAccount values('marta alemu','s102','bs0980','Typist');  
insert into LoginAccount values('Demeke Megersa','s107','as3456','Manager');  
insert into LoginAccount values('SAMUEL Gashaw','s109','8mnmn8','vice manager');  
insert into LoginAccount values('Birhanu Eniyew','s103','bb0909','accountant');  
insert into LoginAccount values('YARED yeshitila','s100','wr8700','Manager');  
insert into LoginAccount values('GEMAL workalemahu','s106','asd090','vice manager');  
insert into LoginAccount values('HILEMARYAM SOLOMON','s101','tth077','vice manager');   
------------------------------------------------------------------
-------------------------------------------------------------------
insert into BankCustomers values('A001','privat','Abebe Negash','M','18/02/5874','B/Dar','06','+125676723',
                                0921666609,'Geologist',48000.00); 
insert into BankCustomers values('A002','privete','Alemishet Lemma','F','12/03/8956','B/Dar','04','+12567673',
                                0921667809,'Nurse',4509.00); 
insert into BankCustomers values('A003','private','Selamawit Negash','F','12/03/8956','ADAMA','03','+12567674',
                                0921633809,'Doctor',30000.00); 
insert into BankCustomers values('A004','Businese','tyota moter','null','25/02/8596','DIRE','04','+12567674',
                                 0921447809,'scientist',45000.00); 
insert into BankCustomers values('A005','privete','Lemma Minda','M','13/02/8745','DILLA','01','+12567675',
                                0921645809,'Actor',4509.00); 
insert into BankCustomers values('A006','businese','ELPA','null','25/05/8596','HAWASSA','04','+12567677',
                                0911667809,'Driver',4500.09); 
insert into BankCustomers values('A007','businese','ethiopian wateragence','null','30/02/1236','GONDER','08','+125676734',
                                0913667809,'Doctor',45090.00); 
insert into BankCustomers values('A008','Businese','Bule starshopping','null','23/05/6987','ARBAMICH','06','+12567671',
                                 0934660009,'manager',10000.00);
insert into BankCustomers values('A009','Businese','limon cafe','null','14/08/8956','SODO','04','+12567679',
                                 0923467879,'manager',10000.00);
insert into BankCustomers values('A010','businese','Ethiopian airline','null','14/05/2563','BUTAJIRA','03','+12567670',
                                 092236459,'Biologist',10000.00);                                  
insert into BankCustomers values('A011','businese','Geda resort','null','8/09/8512','WORABE','01','+12567675',
                                 0921667809,'manager',12000.00);                                  
insert into BankCustomers values('A012','privete','Birhanu Eniyew','M','9/02/5687','B/Dar','02','+12567670',
                                 0921667809,'adviser',11000.00); 
insert into BankCustomers values('A013','eduction','ethiopian custemer authority ','null','9/02/5687','B/Dar','02','+12567670',
                                 0921667809,'adviser',11000.00);                                 
                                                                                                 
 ------------------------------------------------------------------------------------
 ------------------------------------------------------------------------------------  
insert into BankBranch values('B1','DashenJIMMA','JIMMA','ABAJIFAR'); 
insert into BankBranch values('B2','DashenDILLA','DILLA','GIDEO');
insert into BankBranch values('B3','DashenMESKEL','ADDIS ABEBA','ESTIFANOS');
insert into BankBranch values('B4','DashenBole','Addis Abeba','Bole'); 
insert into BankBranch values('B5','DashenGONDER','GONDER','Pyasa'); 
insert into BankBranch values('B6','DashenArbaMinch','ArbaMinch','MENAHARIA'); 
insert into BankBranch values('B7','Dashenbder','addis abeba','22-mazoria'); 
insert into BankBranch values('B8','DASHENADAMA','adama','MEBRATHIL');
insert into BankBranch values('B9','DashenHAWASSA','HAWASSA','BELAMA');
insert into BankBranch values('B10','DASHENBISHOFTU','BISHOFTU','DEZE');
insert into BankBranch values('B11','DASHENNEKEMET','WELLEGA','BEKIJAMA');
-----------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------
insert into BankBalance values('A001','B1','123'); 
insert into BankBalance values('A002','B2','167000');
insert into BankBalance values('A003','B3','100000');
insert into BankBalance values('A004','B4','34000');
insert into BankBalance values('A005','B5','564000');
insert into BankBalance values('A006','B6','23000');
insert into BankBalance values('A007','B7','20000');
insert into BankBalance values('A008','B8','350000');
insert into BankBalance values('A009','B9','100000');
insert into BankBalance values('A010','B10','600000');
insert into BankBalance values('A011','B11','400000');
insert into BankBalance values('A013','B11','100000');
--=====================================================================
--===================================================================================  
                     --QUESTION 3  
--Perform all transactions from T1 to T8 accordingly don’t 
     --forget a money transfer never leave the bank.
       
    --T1                                                                                             

begin tran
update BankBalance set Balance=30000 
where Accno='A001';
select *from BankBalance;
commit tran;

    --T2                                                                             

 begin tran
 update BankBalance  set Balance=Balance-2000
 where   AccNo='A001'
 insert into WithDrowal values ('A001','B4',2000.00,'for traveler','12/05/2014');
 update BankBalance set Balance=Balance+2000
 where AccNo='A010'
 insert into Deposite values('A010','B1',2000.00,'22/05/1996');
 select  * from WithDrowal
 select  * from Deposite
 commit tran
                                                                                                                                          
   -- T3  
 begin tran
 update BankBalance  set Balance=Balance-10000
 where   AccNo='A004' 
 insert into WithDrowal values ('A004','B4',10000,'for salary','1/05/2014');
 update BankBalance  set Balance=Balance+10000
 where   AccNo='A001'   
 insert into Deposite values ('A001','B1',10000,'1/05/2014');
 update BankBalance  set Balance=Balance-3500
 where   AccNo='A001'   
 insert into WithDrowal values ('A001','B1',3500,'to pay to Ethiopian custom Authority','1/05/2014'); 
 update BankBalance  set Balance=Balance+3500
 where   AccNo='A013' 
 insert into Deposite values ('A013','B8',3500,'1/05/2014'); 
 select * from Deposite
 select  * from WithDrowal 
 commit tran 
   --T4
 begin tran
 update BankBalance  set Balance=Balance-50
 where   AccNo='A001'
 insert into WithDrowal values ('A001','B1',50,'to  for lunch bill','12/05/2014');
 update BankBalance  set Balance=Balance+50
 where   AccNo='A0011'  
insert into Deposite values ('A011','B8',50,'1/05/2011'); 
select * from Deposite
select  * from WithDrowal
  commit tran 
  
           --T5
   --A)
  begin tran
  update BankBalance  set Balance=Balance-2000
  where   AccNo='A004' 
  insert into WithDrowal values ('A004','B4',2000,'to pay for over time to abebe','12/05/2013') 
  update BankBalance  set Balance=Balance+2000
  where   AccNo='A001' 
  insert into Deposite values ('A001','B1',2000,'16/05/2014');
  --B)
  select Balance from BankBalance where Accno='A001' 
  --C)
  update BankBalance  set Balance=Balance-1500
  where   AccNo='A005'
  insert into WithDrowal values ('A005','B7',1500,'to pay to abebe','12/05/2014') 
  update BankBalance  set Balance=Balance+1500
  where   AccNo='A001'
  insert into Deposite values ('A001','B1',1500,'16/05/2014'); 
  
  --D)
  update BankBalance  set Balance=Balance-800
  where   AccNo='A001'
  insert into WithDrowal values ('A001','B1',800,'to  for Lemon cafe bill','12/05/2014')
  update BankBalance  set Balance=Balance+800
  where   AccNo='A005' 
  insert into Deposite values ('A005','B5',800,'16/05/2014');
 --E)
update BankBalance  set Balance=Balance-2100
 where   AccNo='A001'
insert into WithDrowal values ('A001','B1',2100,'to  for Blue Star Shopping Mall bill','12/05/2014')
update BankBalance  set Balance=Balance+2100
 where   AccNo='A008' 
 insert into Deposite values ('A008','B6',2100,'16/05/2014'); 
 select * from Deposite
 select *from WithDrowal
 commit tran 

     --T6)
 begin tran
 update BankBalance  set Balance=Balance-(5000*20)
 where   AccNo='A003'
 insert into WithDrowal values ('A003','B3',100000,'deposited','12/05/2014')
update BankBalance  set Balance=Balance+(5000*20)
 where   AccNo='A001'
 insert into Deposite values ('A001','B7',5000*20,'16/05/2014');
select * from WithDrowal
select * from Deposite
SELECT * FROM BankBalance   
 commit tran
   
     --T7)
 --A)
 begin tran
update BankBalance  set Balance=Balance-1500
 where   AccNo='A001'
 insert into WithDrowal values ('A001','B1',1500,'to borrowed Alemishet','12/05/2014')
 update BankBalance  set Balance=Balance+1500
 where   AccNo='A002'  
 insert into Deposite values ('A002','B2',1500,'16/05/2014');
 --B)
 update BankBalance  set Balance=Balance-80
 where   AccNo='A001'
  insert into WithDrowal values ('A001','B1',80,'to   water bill','12/05/2014')
 update BankBalance  set Balance=Balance+80
 where   AccNo='A007' 
 insert into Deposite values ('A007','B7',80,'16/05/2014');
 --C)
update BankBalance  set Balance=Balance-200
 where   AccNo='A001'
  insert into WithDrowal values ('A001','B6',200,'to electric bill ','12/05/2014') 
  update BankBalance  set Balance=Balance+200
 where   AccNo='A006' 
 insert into Deposite values ('A006','B8',200,'16/05/2014'); 
 select * from WithDrowal
 select * from Deposite
  commit tran  
  
       --T8
  begin tran
  select * from BankBalance where AccNo='A001'
  select * from Deposite where AccNo='A001'
  select   * from WithDrowal 
  commit tran
 

     --QUESTION 4
 --CREAT PROCDURES 
 
   --4.1. That Contains Organizations and their Bank Information/balance, branch/
 CREATE PROCEDURE BalanceInformation
 as 
 select Balance,BranchName,Accouttype,custfullname 
 from BankBalance,BankBranch,BankCustomers
 where (Accouttype='Businese' or Accouttype='eduction') 
  and BankBranch.BranchNo=BankBalance.BranchNo 
 and BankCustomers.AccNo=BankBalance.AccNo  ;
  exec BalanceInformation;
  
   --4.2That Contains Customer Names and their Bank Information
 CREATE PROCEDURE BankInformation_2
 as
 select custfullname,BranchName,CityName,Location,Balance
 from BankCustomers,BankBranch,BankBalance where BankBranch.BranchNo=BankBalance.BranchNo 
 
 exec BankInformation_2
    
  --4.3Customer bank transaction (like withdrawal, deposit, Bill payments etc)
CREATE PROCEDURE BankTrans
 as
 select WithDrowalAutoCode ,ReasonWithDrowal,AmountWithDrowal, DepositAutoCode, AmountDeposited 
 from WithDrowal,Deposite where WithDrowal.BranchNo=Deposite.BranchNo and  WithDrowal.Accno=Deposite.Accno
  and ReasonWithDrowal like '%bill';
 exec BankTrans;
 
  --4.4Parameterized procedure that generates withdrawal information
 create procedure WithdrawalInformationByAutocode(@messi varchar(20))
 as
 select *from WithDrowal;
 exec WithdrawalInformationByAutocode'2';
   
   
    --4.5The Total money in the bank
 CREATE PROCEDURE Totalbal
 as
 select SUM(Balance) as'SUM' from BankBalance
 exec Totalbal;
 
 
   
   --4.6
 CREATE PROCEDURE balancinfo
 as
 select  Min(Balance) as 'min',MAX(Balance) as 'max' from BankBalance
 exec balancinfo;
 
   --4.7
  CREATE PROCEDURE TotalTrans
 as
 select sum(AmountWithDrowal) as 'Sum' from WithDrowal
 where ReasonWithDrowal like '%bill';
 exec TotalTrans

 
   --4.8
 
  CREATE PROCEDURE custinfo
 as
 select custfullname,custcity,AmountWithDrowal  from BankCustomers,WithDrowal
 where BankCustomers.AccNo=WithDrowal.AccNo and AmountWithDrowal in( 
 select MAX(AmountWithDrowal) from WithDrowal) 
exec custinfo
 

 --QUESTION 5 ISOLATION LEVELE
        --T1 Isolation Level Read Uncommitted
        --the isolation level read uncommitted doesnt prevent the concurency problem because it reads an uncommited transaction 
 Begin Tran
  set transaction isolation level 
  read uncommitted
  select * from BankCustomers where
  Accno='A007'
commit tran
 
 
                                           	     --T2 Isolation Level Read Committed
                                           	     --this isolation level pevents concurency problem because it does not 
                                           	     --permit another transaction to get the lock of the current item 
                                           	     --before the current transaction commits 
                                         	     Begin Tran
                                                set transaction isolation level 
                                                 read committed
                                                update BankCustomers set 
                                                CustfullName='selomon'
                                                   where Accno='A007'
                                                  select * from BankCustomers 
                                                  where
                                                Accno='A007'
                                                commit tran 
 --T3 Isolation Level Repeatable Read
 --this isolation level prevents concurrency problem by eliminating dirty read  
 Begin Tran
set transaction isolation level 
repeatable read
update BankCustomers set 
custfullName='selomon'
where Accno='A007'
select * from BankCustomers where
Accno='A007'
commit tran
                                        --T4 Isolation Level Serializable
                                        --this isolation level prevents concurrency problem becuase the transaction are interleaved and 
                                        -- it does not permit another transaction to get the lock of the current item 
                                         --before the current transaction commits                                                                     
                                          Begin Tran
                                         set transaction isolation level 
                                         serializable
                                         update BankCustomers set 
                                         custfullName='selomon'
                                       where Accno='A007'
                                       select * from BankCustomers where
                                         Accno='A007'
                                       commit tran
--T5 Isolation Level Snapshot
--this isolation level prevents concurrency problem by limiting their access operation 
begin tran
 use bank_system
 alter database DashenBankDB
 SET ALLOW_SNAPSHOT_ISOLATION on
 set transaction isolation level 
 snapshot
 update BankCustomers set 
 custfullName='selomon'
 where Accno='A007'
 select * from BankCustomers where
 Accno='A007'
commit tran
  