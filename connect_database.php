<?php
        $hostName="localhost";
        $user="root";
        $pass="";
        $db="fmaaz.cv";
        $connect_database = new PDO("mysql:host=$hostName;dbname=$db;charset=utf8;",$user,$pass);
?>