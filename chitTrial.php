<?php

//$data = date('H:m:s A');
class cheatingRecord{
    //public $cheatingtime=date('h:i:s a');
   //protected $date 
   // public $data;
    //public $data2;
    public function record_cheating($bc,$feedInterval,$date,$time){
        //require_once"db.php";
      $sql1 = "INSERT INTO `cheatrecord`(`Roll_No`, `barcode`, `Date`, `Time`, `feedInterval`) VALUES ('','$bc','$date','$time','$feedInterval')";
         mysql_query($sql1) or die(mysql_error());
        
    }
    
}


?>