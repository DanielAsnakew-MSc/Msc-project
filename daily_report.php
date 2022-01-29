
<script type="text/javascript">
    $(document).ready(function()
    {	
        $("#selectdated").change(function(){ 
            var message=0;
            var year=  $("#selectyeard").val();
            var month=$("#selectmonthd").val();
            var dates=$("#selectdated").val();  
            var cafenum=$("#selectcafe2").val();
            if(year==''|| month==''|| dates=='') {  message++; }
                            
            if(message==0){
                $.post("reports.php",{year1:year,month1:month,dates1:dates,cafenumber:cafenum},function(data){ 
                    $("#displayDayreport").html(data);
                    $("#resultprint").show();
                })
            }
        }) ;
        $("#selectyeard").change(function(){
            var message=0;
            var year=  $("#selectyeard").val();
            var month=$("#selectmonthd").val();
            var dates=$("#selectdated").val();  
            var cafenum=$("#selectcafe2").val();
            if(year==''|| month==''|| dates=='') {  message++; }
                                    
            if(message==0){
                $.post("reports.php",{year1:year,month1:month,dates1:dates,cafenumber:cafenum},function(data){ 
                    $("#displayDayreport").html(data);
                    $("#resultprint").show();
                })
            }
        }) ;
        $("#selectmonthd").change(function(){
            var message=0;
            var year=  $("#selectyeard").val();
            var month=$("#selectmonthd").val();
            var dates=$("#selectdated").val();  
            var cafenum=$("#selectcafe2").val();
            if(year==''|| month==''|| dates=='') {  message++; }
                                       
            if(message==0){
                $.post("reports.php",{year1:year,month1:month,dates1:dates,cafenumber:cafenum},function(data){ 
                    $("#displayDayreport").html(data);
                    $("#resultprint").show();
                })
            }
        }) ;
        $("#selectcafe2").change(function(){ 
            var message=0;
            var year=  $("#selectyeard").val();
            var month=$("#selectmonthd").val();
            var dates=$("#selectdated").val();  
            var cafenum=$("#selectcafe2").val();
            if(year==''|| month==''|| dates=='') {  message++; }
            if(message==0){
            
                $.post("reports.php",{year1:year,month1:month,dates1:dates,cafenumber:cafenum},function(data){
                    $("#displayDayreport").html(data);
                    $("#resultprint").show();
                })
            }
        }) ;
     
             
    });
</script>


<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>Daily report</h3>
<table width="100%"><tr>
        <td align="right" width="50%">
            <select name="select1" id="selectyeard"  >
                <option value="">...select Year...</option>
                <?php
                $dts = date("Y-m-d");
                for ($i = 2000; $i <= $dts; $i++) {
                    echo "<option value='$i'>" . $i . "</option>";
                }
                ?>

            </select>
        </td> 
        <td align="center">  <select name="selectmonth"  id="selectmonthd" >
                <option value="">..Select Month..</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>            
            </select>    </td>
        <td >
            <select name="select3" id="selectdated">
                <option value="">...select date...</option>
                <?php
                for ($i = 1; $i <= 31; $i++) {

                    if ($i < 10)
                        $j = "0" . $i;
                    else
                        $j = $i;


                    echo "<option value='$j'>" . $j . "</option>";
                }
                ?>
            </select> </td>

    </tr>


    <tr><td colspan="3" id="displayDayreport"></td></tr>
    <tr bgcolor="white" style="display:none; border-color: #ffffff;" id="resultprint"><td colspan="3" align="right"  >
            <input type="button" value="Print Report" onclick="PrintDivData('displayDayreport');"/> </td></tr>

</table>