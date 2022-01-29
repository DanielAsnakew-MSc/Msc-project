<?php

require_once 'db.php';

class Report {

    function display_year_report($year, $cafenumber) {
        $tempfiles = '';
        $breakfast = array();
        $lunch = array();
        $dinner = array();
        $total_meal = array();
        $nbreakfast = array();
        $nlunch = array();
        $ndinner = array();
        $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'october', 'November', 'December');
        for ($i = 1; $i < 13; $i++) {
            $dnr = 0;
            $brk = 0;
            $lnch = 0;
            if ($i < 10)
                $month = "0" . $i;
            else
                $month = $i;

            $year_month = $year . "-" . $month;

            if ($cafenumber == '') {
                $query = "SELECT  * FROM `mealcard` WHERE  Date LIKE '%$year_month%' ";
                $query2 = "SELECT * FROM cafeinfo WHERE   Status='Cafe' AND registration_date LIKE '%$year%' ";
            } else {
                //SELECT stud.IDNumber,stud.Year,assignedstud.IDNumber FROM assignedstudents
                //as assignedstud INNER JOIN students as stud ON stud.IDNumber=assignedstud.IDNumber WHERE stud.Year='5'")
                $query = "SELECT meal.*,cafinfo.IDNumber  FROM mealcard as meal INNER JOIN cafeinfo as cafinfo ON meal.IDNumber=cafinfo.IDNumber WHERE  meal.Date LIKE '%$year_month%'  AND cafinfo.CafeNumber='$cafenumber' ";
                $query2 = "SELECT * FROM cafeinfo WHERE   (Status='Cafe' AND CafeNumber='$cafenumber') AND registration_date LIKE '%$year%'";
            }
            $query_result = mysql_query($query) or die(mysql_error());
            array_push($total_meal, mysql_num_rows($query_result));
            $query_result2 = mysql_query($query2) or die(mysql_error());
            $numrows = mysql_num_rows($query_result2);
            while ($rows = mysql_fetch_array($query_result)) {
                if ($rows['brakefast'] == 1)
                    $brk++;
                if ($rows['lunch'] == 1)
                    $lnch++;
                if ($rows['dinner'] == 1)
                    $dnr++;
            }
            array_push($breakfast, $brk);
            array_push($lunch, $lnch);
            array_push($dinner, $dnr);
            array_push($nbreakfast, $numrows - $brk);
            array_push($nlunch, $numrows - $lnch);
            array_push($ndinner, $numrows - $dnr);
        }
        $tempfiles = $tempfiles . "<table width=100% border=1 style='border-collapse: collapse'>            
            <tr bgcolor='#FFFFCE' ><th colspan='9' align='center' style='color:#333399'>" . $year . " Cafeteria " . $cafenumber . " Report </th></tr>
               <tr><th  rowspan=2>Date</th>
              <th colspan=2>Breakfast</th>
              <th colspan=2>Lunch</th>
              <th colspan=2>Dinner</th>
                <th colspan=2>Total</th> </tr>
        <tr style='background-image:url(images/bgimage.png);'>
            <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
             <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
              <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
               <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th></tr>";

        for ($k = 0; $k < sizeof($breakfast); $k++) {
            if ($k % 2 == 0)
                $trbg = '#CEDDB3';
            else
                $trbg = '#FFFFFF';
            $tempfiles = $tempfiles . " <tr bgcolor=$trbg><td>" . $months[$k] . "</td>
                        <td align='center'>" . $breakfast[$k] . "</td> <td align='center'><font color='#800000'>" . $nbreakfast[$k] . "</font></td>
                        <td align='center'>" . $lunch[$k] . " <td align='center'><font color='#800000'>" . $nlunch[$k] . "</font></td>
                        <td align='center'>" . $dinner[$k] . "</td><td align='center'><font color='#800000'>" . $ndinner[$k] . "</font></td>
                        <td align='center'>" . ($breakfast[$k] + $lunch[$k] + $dinner[$k] ) . "</td> 
                        <td align='center'><font color='#800000'>" . ($nbreakfast[$k] + $nlunch[$k] + $ndinner[$k] ) . "</font></td></tr> ";
        }
        $tempfiles = $tempfiles . "<tr bgcolor=#CCFFCCFF>
            <th>Total</th>
                 <th>" . array_sum($breakfast) . "</th>
                <th><font color=#800000>" . array_sum($nbreakfast) . "</font></th>
            <th>" . array_sum($lunch) . "</th><th><font color=#800000>" . array_sum($nlunch) . "</font></th>
            <th> " . array_sum($dinner) . "</th><th><font color=#800000>" . array_sum($ndinner) . "</font></th>
            <th >" . ( array_sum($breakfast) + array_sum($lunch) + array_sum($dinner)) . "</th><th><font color=#800000>" . ( array_sum($nbreakfast) + array_sum($nlunch) + array_sum($ndinner)) . "</font></th> </tr></table>";

        return $tempfiles;
    }

    function display_month_report($selected_year, $selected_month, $cafenumber) {
        $breakfast = array();
        $lunch = array();
        $dinner = array();
        $datearray = array();
        $nbreakfast = array();
        $nlunch = array();
        $ndinner = array();

        $tempfiles = '';
        // $total_meal = array();
        $dt1 = $selected_month;
        $year_month = $selected_year . "-" . $selected_month;
        $monthlen = 0;
        if ($dt1 == '01' || $dt1 == '03' || $dt1 == '05' || $dt1 == '07' || $dt1 == '08' || $dt1 == '10' || $dt1 == '12')
            $monthlen = 31;
        if ($dt1 == '04' || $dt1 == '06' || $dt1 == '09' || $dt1 == '11')
            $monthlen = 30;
        if ($dt1 == '02')
            $monthlen = 28;
        $month_text = $this->convert_month_string($selected_month);
        $tempfiles = $tempfiles . "<table width=100% border=1 style='border-collapse: collapse'>            
 <tr bgcolor='#FFFFCE' ><th colspan='9' align='center' style='color:#333399'>" . $month_text . " " . $selected_year . " Cafeteria " . $cafenumber . " Report </th></tr>
<tr><th  rowspan=2>Date</th>
    <th colspan=2>Breakfast</th>
    <th colspan=2>Lunch</th>
    <th colspan=2>Dinner</th>
    <th colspan=2>Total</th>
  </tr>
  <tr style='background-image:url(images/bgimage.png)'>
            <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
             <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
              <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
               <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>";
        for ($i = 1; $i <= $monthlen; $i++) {
            $brk = 0;
            $lnch = 0;
            $dnr = 0;

            if ($i < 10)
                $dt = "0" . $i;
            else
                $dt = $i;
            $year_month_date = $year_month . "-" . $dt;


            if ($cafenumber == '') {
                $query = "SELECT * FROM `mealcard` WHERE Date LIKE '$year_month_date' ";
                $query2 = "SELECT * FROM cafeinfo WHERE   Status='Cafe' AND registration_date LIKE '%$selected_year%' ";
            } else {
                $query = "SELECT meal.*,cafinfo.IDNumber  FROM mealcard as meal
                        INNER JOIN cafeinfo as cafinfo ON meal.IDNumber=cafinfo.IDNumber 
                        WHERE  meal.Date LIKE '$year_month_date'  AND cafinfo.CafeNumber='$cafenumber' ";
                // $query2 = "SELECT * FROM cafeinfo WHERE   Status='Cafe' AND CafeNumber='$cafenumber'";
                $query2 = "SELECT * FROM cafeinfo WHERE   (Status='Cafe' AND CafeNumber='$cafenumber') AND registration_date LIKE '%$selected_year%'";
            }
            $query_result = mysql_query($query) OR die(mysql_error());
            $query_result2 = mysql_query($query2) or die(mysql_error());
            $numrows = mysql_num_rows($query_result2);

            while ($rows = mysql_fetch_array($query_result)) {
                if ($rows['brakefast'] == 1)
                    $brk++;
                if ($rows['lunch'] == 1)
                    $lnch++;
                if ($rows['dinner'] == 1)
                    $dnr++;
            }
            array_push($breakfast, $brk);
            array_push($lunch, $lnch);
            array_push($dinner, $dnr);

            array_push($nbreakfast, $numrows - $brk);
            array_push($nlunch, $numrows - $lnch);
            array_push($ndinner, $numrows - $dnr);
            array_push($datearray, $year_month_date);
        }
        for ($k = 0; $k < sizeof($breakfast); $k++) {
            if ($k % 2 == 0)
                $trbg = '#DFF3D9';
            else
                $trbg = '#FFFFFF';
            $tempfiles = $tempfiles . " <tr bgcolor=$trbg><td>" . $datearray[$k] . "</td>
                        <td align='center'>" . $breakfast[$k] . "</td> <td align='center'><font color='#800000'>" . $nbreakfast[$k] . "</font></td>
                        <td align='center'>" . $lunch[$k] . " <td align='center'><font color='#800000'>" . $nlunch[$k] . "</font></td>
                        <td align='center'>" . $dinner[$k] . "</td><td align='center'><font color='#800000'>" . $ndinner[$k] . "</font></td>
                        <td align='center'>" . ($breakfast[$k] + $lunch[$k] + $dinner[$k] ) . "</td> 
                        <td align='center'><font color='#800000'>" . ($nbreakfast[$k] + $nlunch[$k] + $ndinner[$k] ) . "</font></td></tr> ";
        }

        $tempfiles = $tempfiles . "<tr bgcolor=#CCFFCCFF>
            <th>Total</th>
                 <th>" . array_sum($breakfast) . "</th>
                <th><font color=#800000>" . array_sum($nbreakfast) . "</font></th>
            <th>" . array_sum($lunch) . "</th><th><font color=#800000>" . array_sum($nlunch) . "</font></th>
            <th> " . array_sum($dinner) . "</th><th><font color=#800000>" . array_sum($ndinner) . "</font></th>
            <th >" . ( array_sum($breakfast) + array_sum($lunch) + array_sum($dinner)) . "</th><th><font color=#800000>" . ( array_sum($nbreakfast) + array_sum($nlunch) + array_sum($ndinner)) . "</font></th> </tr></table>";
        ;
        return $tempfiles;
    }

    function display_day_report($year, $month, $date, $cafenumber) {
        $brk = 0;
        $lnch = 0;
        $dnr = 0;
        $tempfiles = '';
        $year_mon_date = $year . "-" . $month . "-" . $date;
        if ($cafenumber == '') {
            $query = "SELECT *  FROM `mealcard` WHERE Date LIKE '$year_mon_date' ";
            $query2 = "SELECT * FROM cafeinfo WHERE   Status='Cafe' AND registration_date LIKE '%$year%' ";
        } else {
            $query2 = "SELECT * FROM cafeinfo WHERE   (Status='Cafe' AND CafeNumber='$cafenumber') AND registration_date LIKE '%$year%'";
            $query = "SELECT meal.*,cafinfo.IDNumber  FROM mealcard as meal INNER JOIN cafeinfo as cafinfo ON meal.IDNumber=cafinfo.IDNumber WHERE  meal.Date LIKE '$year_mon_date'  AND cafinfo.CafeNumber='$cafenumber' ";
        }
        $query_result = mysql_query($query) OR die(mysql_error());
        $query_result2 = mysql_query($query2) or die(mysql_error());
        $numrows = mysql_num_rows($query_result2);
        $tempfiles = $tempfiles . "<table width=100% border=1 style='border-collapse: collapse'>            
    <tr bgcolor='#FFFFCE' ><th colspan='9' align='center' style='color:#333399'>" . $year_mon_date . " Cafeteria " . $cafenumber . " Report</th></tr>
     <tr><th  rowspan=2>Date</th>
    <th colspan=2>Breakfast</th>
    <th colspan=2>Lunch</th>
    <th colspan=2>Dinner</th>
    <th colspan=2>Total</th>
  </tr>
  <tr style='background-image:url(images/bgimage.png);'>
            <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
             <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
              <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>
               <th><img src='images/yebelu.jpg' height=30 width=50/></th><th><img src='images/yalbelu.jpg' height=30 width=50/> </th>";
        while ($rows = mysql_fetch_array($query_result)) {
            if ($rows['brakefast'] == 1)
                $brk++;
            if ($rows['lunch'] == 1)
                $lnch++;
            if ($rows['dinner'] == 1)
                $dnr++;
        }
        $tempfiles = $tempfiles . " <tr ><td>" . $year_mon_date . "</td>
                        <td align='center'>" . $brk . "</td> 
                            <td align='center'><font color='#800000'>" . ( $numrows - $brk) . "</font></td>
                        <td align='center'>" . $lnch . "</td> 
                            <td align='center'><font color='#800000'>" . ($numrows - $lnch) . "</font></td>
                        <td align='center'>" . $dnr . "</td>
                         <td align='center'><font color='#800000'>" . ($numrows - $dnr) . "</font></td>
                        <td align='center'>" . ($brk + $lnch + $dnr ) . "</td> 
                        <td align='center'><font color='#800000'>" . (($numrows - $brk) + ($numrows - $lnch) + ($numrows - $dnr) ) . "</font></td></tr> ";
        return $tempfiles;
    }

    function display_filterd_report($intial, $destination, $cafenumber) {

        $array_date = array();
        $breakfast = array();
        $lunch = array();
        $dinner = array();
        $tempfiles = '';
        if ($cafenumber == '')
            $query = "SELECT  * FROM `mealcard` WHERE Date >= '$intial' AND Date <= '$destination' GROUP BY  Date   ";
        else {

            $query = "SELECT meal.*,cafinfo.IDNumber  FROM mealcard as meal INNER JOIN cafeinfo as cafinfo ON meal.IDNumber=cafinfo.IDNumber WHERE  (meal.Date >= '$intial' AND meal.Date <= '$destination')  AND cafinfo.CafeNumber='$cafenumber' GROUP BY  Date ";
            //  $query2 = "SELECT * FROM cafeinfo WHERE   (Status='Cafe' AND CafeNumber='$cafenumber') AND registration_date LIKE '%$year%'";
        }

        $query_result = mysql_query($query) or die(mysql_error());

        while ($rows = mysql_fetch_array($query_result)) {
            array_push($array_date, $rows['Date']);
        }
        for ($i = 0; $i < sizeof($array_date); $i++) {
            $brk = 0;
            $lnch = 0;
            $dnr = 0;

            $date_1 = $array_date[$i];
            $query = "SELECT *  FROM `mealcard` WHERE Date LIKE '$date_1' ";
            $result_query = mysql_query($query) or die(mysql_error());
            while ($rows = mysql_fetch_array($result_query)) {
                if ($rows['brakefast'] == 1)
                    $brk++;
                if ($rows['lunch'] == 1)
                    $lnch++;
                if ($rows['dinner'] == 1)
                    $dnr++;
            }

            array_push($breakfast, $brk);
            array_push($lunch, $lnch);
            array_push($dinner, $dnr);
        }

        $tempfiles = $tempfiles . "<table width=100% border=1 style='border-collapse: collapse'>
           <tr bgcolor='#FFFFCE'><td colspan='5' align='center' style='color:#0C4563;' >Cafeteria " . $cafenumber . " Report From " . $intial . "  To " . $destination . "</td></tr>
           <tr bgcolor='#FFFFCE'> <th>Dates</th>
            <th>BreakFast</th>
            <th>Lunch</th>
            <th> Dinner</th>
            <th>Total</th> </tr>";
        for ($k = 0; $k < sizeof($array_date); $k++) {
            $tempfiles = $tempfiles . " <tr ><td>" . $array_date[$k] . "</td>
                            <td align='center'>" . $breakfast[$k] . "</td>
                            <td align='center'>" . $lunch[$k] . "</td>
                            <td align='center'>" . $dinner[$k] . "</td>
                            <td align='center'>" . ($breakfast[$k] + $dinner[$k] + $lunch[$k] ) . "</td></tr> ";
        }

        $tempfiles = $tempfiles . "<tr bgcolor=#CCFFCCFF>
            <th>Total</th>
            <th>" . array_sum($breakfast) . "</th>
            <th>" . array_sum($lunch) . "</th>
            <th> " . array_sum($dinner) . "</th>
            <th>" . ( array_sum($breakfast) + array_sum($lunch) + array_sum($dinner)) . "</th> </tr></table>";
        return $tempfiles;
    }

    function convert_month_string($month) {
        if ($month == '01') {
            $month = 'January';
        } elseif ($month == '02') {
            $month = 'February';
        } elseif ($month == '03') {
            $month = 'March';
        } elseif ($month == '04') {
            $month = 'April';
        } elseif ($month == '05') {
            $month = 'May';
        } elseif ($month == '06') {
            $month = 'June';
        } elseif ($month == '07') {
            $month = 'July';
        } elseif ($month == '08') {
            $month = 'August';
        } elseif ($month == '09') {
            $month = 'September';
        } elseif ($month == 10) {
            $month = 'October';
        } elseif ($month == 11) {
            $month = 'November';
        } elseif ($month == 12) {
            $month = 'December';
        }
        return $month;
    }

    function transfer_students($school, $cafenumber_moveTo, $cafenumber_moveFrom) {
        if ($school == 'all') {
            $query = " UPDATE `cafeinfo` SET      
                     Shift_Cafe='$cafenumber_moveTo' WHERE CafeNumber='$cafenumber_moveFrom'";
            $result = mysql_query($query) or (die(mysql_error()));
            $query2 = "SELECT Shift_Cafe from cafeinfo WHERE Shift_Cafe='$cafenumber_moveTo' ";
            $num_rows = mysql_num_rows(mysql_query($query2));
            echo "<font color=green size=3px>" . $num_rows . ' Students Succesfully transfered to Cafteria ' . $cafenumber_moveTo . "</font>";
        } else {
            $query = "SELECT stud.School,stud.Department,stud.Stream,cafeuser.* FROM cafeinfo
             as cafeuser INNER JOIN students as stud ON cafeuser.id_Number=stud.IDNumber WHERE cafeuser.CafeNumber='$cafenumber_moveFrom'   ";
            $result = mysql_query($query) or die(mysql_error());
            $num_rows = mysql_num_rows($result);
            while ($rows = mysql_fetch_array($result)) {

                $query3 = " UPDATE `cafeinfo` SET      
                     Shift_Cafe='$cafenumber_moveTo' WHERE CafeNumber='$cafenumber_moveFrom'";
                mysql_query($query3) or (die(mysql_error()));
            }
            echo "<font color=green size=3px>" . $num_rows . ' Students Succesfully transfered to Cafteria ' . $cafenumber_moveTo . "</font>";
        }
    }

    function reset_transfer($reset_to) {
        $query3 = " UPDATE `cafeinfo` SET  Shift_Cafe='0',    
                     CafeNumber='$reset_to' WHERE CafeNumber='$reset_to'";
        $result = mysql_query($query3) or die(mysql_query($query3));

        if ($result) {
            echo '<font color=green size=3px>All students are transferred  Successfuly to previous cafeteria</font>';
        } else {
            echo '<font color=red size=3px>transfer faild Please try again</font>';
        }
    }

    function update_password($username, $cpass, $npass) {
        $cpass = md5($cpass);
        $npass = md5($npass);
        $query = "SELECT  *   FROM `cafteriamember` WHERE Useraname='$username' and Password='$cpass'";
        $result = mysql_query($query) or die(mysql_error());
        if (mysql_num_rows($result) == 1) {
            $sql = "UPDATE cafteriamember SET Password='$npass' WHERE Useraname='$username'";
            mysql_query($sql) or die(mysql_error());
            echo '<font color=green>successfuly updated</font>';
        } else {
            echo '<font color=red>   incorrect Current  Password</font>';
        }
    }

    function resetpassword($un, $phn, $rol) {
        $user = mysql_real_escape_string($un);
        $phone = mysql_real_escape_string($phn);
        $in = '';
        $temp = '';
        // $newpass=mysql_real_escape_string($np);
        $role = mysql_real_escape_string($rol);
        //SELECT `Roll_Number`, `FirstName`, `LastName`, `Phone`, ``,
// `Password`, `Control`, `Cafteria`, `UserPrivilage` FROM `cafteriamember` WHERE 1
        $sql = "SELECT * FROM cafteriamember WHERE Useraname='$user' AND UserPrivilage='$role' AND Phone='$phone'";
        $result = mysql_query($sql) or die(mysql_errno());
        if (mysql_num_rows($result) != 0) {
            $in = $this->genpwd(10);
            $resetpassword = md5($in);
            $resut = mysql_query("UPDATE cafteriamember SET Password='$resetpassword'  WHERE Useraname='$user'") or die(mysql_error());
            if ($resut) {
                //  $subject="Hi, this the reseted password from astu odms";
                $temp = $temp . "<font color=green size=3px>  successfully reseted <br/> now take this password <br/></font><font color=blue size=2px>" . $in . "</font>";
            }
        } else {
            $temp = $temp . "<font color=red size=3px>  username or role  is not correct </font>";
        }
        return $temp;
    }

    function genpwd($cnt) {
        $pwd = str_shuffle('abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@#%$*');
        return substr($pwd, 0, $cnt);
    }
    public function getfeedtime($id,$feddtime){
        return $id;
        

    }

}