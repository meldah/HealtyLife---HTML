<?php
if(empty($_POST["ime"])||empty($_POST["ime2"])||empty($_POST["ime3"])||empty($_POST["address"])
||empty($_POST["tel"])||empty($_POST["produkt"])||empty($_POST["broi"])) die("There are empty fields!");
//svarzvane sas sarvara i vkarvane na vavedenite danni
$con=mysql_connect("localhost","root","")
or die("No connection with the server!".mysql_error());

$bd=mysql_query("CREATE DATABASE if not exists porachki;",$con)
or die("The database was not created!".mysql_error());
echo "The database was successfully created!";
$sbd=mysql_select_db("porachki",$con)
or die ("The database cannot be selected!".mysql_error());
echo "<br/>The database is active!";
$table=mysql_query("CREATE TABLE if not exists
zaqvki(tel varchar(30) Primary key not null, ime varchar(15) not null,
ime2 varchar(15) not null, ime3 varchar(15) not null, address varchar(30) not null,
produkt varchar(10) not null, broi int(1) unsigned not null) engine=MyISAM collate=utf8_general_ci;")
or die("Error creating table!".mysql_error());
echo "<br/>The table is created!";
extract($_POST);
$ins=mysql_query("INSERT INTO zaqvki(ime,ime2,ime3,address,produkt,tel,broi) 
value(\"$ime\",\"$ime2\",\"$ime3\",\"$address\",\"$produkt\",\"$tel\",\"$broi\");") 
or die("The registration was unsuccessful, please try again!".mysql_error());
echo "<br/>The registration was successful!";
?>
