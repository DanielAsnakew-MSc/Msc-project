<?php
        $server='localhost';
        $user='root';
       $password="";
        $con=mysql_connect($server,$user,$password);
        if(!$con)
        {
            echo "database is not connected";
        }
        mysql_selectdb('cafeteriadata',$con) or die(mysql_error().'coudnot select database');
?>