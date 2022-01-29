<style type="text/css">
#status{
    padding-left: 40px;
    padding-right: 40px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-left: 55px;
    background: #00AEAE;
    border: #00007D;
    border-color: #002B55;
    border-width: thick;
    border-radius: 20px;
    display:none;
}
</style>
<html>
<head>
<title>Barcode Javascript</title>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $("#bcode")
        .focus()
        .attr('autocomplete', 'off')
        .keyup(function(event){
            // if the timer is set, clear it
            if (barcode_watch_timer !== false)
                clearTimeout(barcode_watch_timer);
            // set the timer to wait 500ms for more input
            barcode_watch_timer = setTimeout(function () {
                process_barcode_input();
                
            }, 1000);
            // optionally show a status message
           // $("#status").html('waiting for more input...').show();
            // return false so the form doesn't submit if the char is equal to "enter"
             $("#bcode").val()='';
            return false;
        });
});

var barcode_watch_timer = false;
function process_barcode_input() {
    // if the timer is set, clear it
    if (barcode_watch_timer !== false)
        clearTimeout(barcode_watch_timer);

    // grab the value, lock and empty the field
   var b = $("#bcode").val();
   $("#bcode").attr('value', '');

    // empty the status message
    $("#status").empty();

    // add a loading message
    $("#status").html('<img align="absmiddle" src="images/loading.gif" /> Checking availability...').show();
    // send the ajax request
    $.ajax({
        type: "POST",
        url: "r1.php",
        data : "barcode=" + b,
        success: function(msg) {
            // unlock the field, show a success status
         
            $("#status").html(msg).show();
            
        }
    });
    
    
    
}

</script>

</head>
<body>
<label for="barcode">Enter a barcode : </label>
    <input type="text" name="barcode" value="" id="bcode" /><br />
    <h4 align="center">Welcome To Barcode Test Page </h4>
   
    <div id="status">  </div>
</body>
</html>