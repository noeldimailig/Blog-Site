<?php
//connections credentials
$servername = "localhost";
$username = "root";
$password = "";

//optional set of attributes to set
$opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    );
//connection string (ito na yung tatawagin natin kapag mageexecute na ng query)
$con = new PDO("mysql:host=$servername;dbname=blog;charset=utf8", $username, $password, $opt);
?>