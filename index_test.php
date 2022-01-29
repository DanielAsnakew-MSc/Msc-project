<html>
<head>
<<style type="text/css">
#Container {
    padding-top: 5px;
	position:absolute;
	top:0px;
	bottom:0px;
	left:0px;
	right:0px;
	overflow: auto;
    background-color: #000000;
	
}
#status{
    padding-left: 40px;
    padding-right: 40px;
    padding-top: 10px;
    padding-bottom: 10px;
    margin-left: 55px;
    background-color: #E6F2FF;
    border: #00007D;
    border-color: #002B55;
    border-width: thick;
    border-radius: 20px;
    display:none;
}
#MenuBar {
	height:85px;
    margin-left: 5%;
    margin-right: 5%;
	color: #9C0;
    width: 90%;
   background:#fff url(images/back.jpg) no-repeat;
    border-radius: 10px 10px 0px 0px;
}
#Content{
   margin-top: 0%;
   margin-left: 5%;
   margin-right: 5%;   
   height: 82%;
   border-bottom-left-radius:30px;
   border-bottom-right-radius:30px;
   padding: 20px; 
}
.twa
    {
        text-align: center;
        vertical-align: middle;
        color:blue;
        text-decoration: none;
        width: 7.5%;      
        border: none;
        padding-bottom: 0px;
        list-style: none;  
        font-size:120%; 
   }
a:link
{
color: #FF0000;
text-decoration: none;
}
a:visited
{
color: red;
font-size: 14px;
}
#MenuBar tr td li a:Hover
{
color: #FFFF82;font-size: 14px;
}
.inputfield{
    width: 200px;
    height: 30px;
}
#apDiv1 {
	position:absolute;
	width:532px;
	height:138px;
	z-index:1;
	left: 276px;
	top: 143px;
}
#apDiv2 {
	position:absolute;
	right:6%;
	height:153px;
	z-index:1;
	left: 6%;
	top: 80%;
    border-radius:10px ;
	background-color: #003366;
}
</style>
<title>Barcode Reader</title>
<script src="jquery-1.7.1.min.js"></script>
<script src="jquery.barcode.0.3.js"></script>

 

</head>
<body>
<div id="Container">
<div id="MenuBar" style="font-family:vijaya; font-size:50px; color:#008080 ;text-align: center;"  > Adama Science and Technology University</div>

<div id="Content" style="background-color: #E6F2FF;">
<table align="center">
<tr><td align="center" style="font-family:vijaya; font-size:50px; color:#0066FF" ><b>Automated Cafeteria System</b></td></tr>
</table>
<p>&nbsp;</p>
<form name="formlogin" method="post" action="logincafe.php">
   <table width="50%"  align="center">
  <tr>
    <td style="font-family:vijaya; font-size:24px; color:#0066FF" align="right"><b>Username :</b></td>
    <td ><input type="text" name="username" value="" id="username"  class="inputfield"/><br />  </td>
    
  </tr>
  <tr><td colspan="2"><p></p><p></p></td></tr>
  <tr>
    <td style="font-family:vijaya; font-size:24px; color:#0066FF" align="right"><b>Password :</b></td>
    <td ><input type="password" name="password" value="" id="password"  class="inputfield"/><br />  </td>
    <tr><td colspan="2" align="center" style="color: red;"><?php
	if(isset($_GET['id']))
    {
       echo  $_GET['id'];
    }
?></td></tr>
  </tr>
  <tr><td colspan="2" align="center"><br /><input type="submit" value="Login" style="width: 100px; height: 30px;"/></td></tr>
  
</table>
  </form>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
</div>

</div>

</body>
</html>