<!--
Barcode Scanner and Jquery/Ajax

By lawrence - Posted on April 6th, 2011
Printer-friendly versionPDF version
Years ago I had built a small library system with PHP/MySQL/Apache/Linux for a local church. Barcode scanners are used to scan items. 
The librarians need to scan the item and then use a mouse to click on a button to submit a web form for processing. 
The process is working fine, except it is not convenient. Recently, I rewrite the system with an object oriented approach. 
At the same time, I use AJAX to trigger the form submission. The librarians are no longer to click on a submit button. 
Jquery has very good support for AJAX.

The idea is to trigger the form submission when an enter key is pressed. How to ask the scan to press an enter key? 
The trick is to add a suffix code (Enter Key Code) to the end of the barcode data. 
I have a Symbol LS 19021-1000 handle-held scanner, here are the procedures.

  1.Add Scan Data Options
     a. Scan Options
     b. DATA SUFFIX
     c. Enter
  2.Suffix Values
     a. Scan Suffix
     b. 7 0 1 3 (Numeric Bar Codes value for Enter key)

I had encountered cases AJAX failed to work.
One problem is that characters returned from the database are incorrectly encoded. 
The database is BIG5 encoded, however, the AJAX process is UTF-8. 
I need to convert the characters from BIG5 to UTF-8 once retrieved from database. 
The other problem is if there are "echo" output messages before the JSON object, the whole process wil fail.
       See: http://www.drupalschool.net/node/786
-->

<html>
<head>
<title>Barcode Javascript</title>
<script type="text/javascript" src="jquery-barcode.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">

        $(document).ready(function(){
            $('#theBarcode').keyup(function(e){
                 barcode = $(this);
                // if Enter key was pressed, send the barcode to backend 
                if( (e.keyCode == 13) && (barcode.val().length > 10)){
                  sendBarcode(barcode.val());
                  //alert(barcode.val());
                // clear the input 
                  barcode.val('');
                }  
            });
        });
        function sendBarcode(b){
             alert(b);
          $.post("r.php",{ barcode: b },
            function(data){
               
                if(data.status=='success'){
                  $('#display').html(data.content);
                } else {
                  $('#display').html(data.message);
                }
            }, "json");
        }

</script>

</head>
<body>
<label for="barcode">Enter a barcode : </label>
    <input type="text" name="barcode" value="" id="theBarcode" />
   
    <div id="display"> Welcome To Barcode Test Page </div>
</body>
</html>