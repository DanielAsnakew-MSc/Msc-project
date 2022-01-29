<html>
    <head>
        <script type="text/javascript">          
        </script>
        <style type="text/css">
            #Container {
                padding-top: 5px;
                position:absolute;
                top:0px;
                bottom:0px;
                left:0px;
                right:0px;
                overflow: auto;
                background-color: #CCCCCC;
            }
            #status{
             
                background-color: #E6F2FF;
               
            }
            .reportclass a:link{
                text-decoration: none;
}
            #MenuBar {
                height:100px;
                color: #9C0;              
/*                background:#fff url(images/back.jpg) no-repeat;*/
                border-radius: 15px 15px 0px 0px;                  
                min-width:1000px; 
                max-width: 1300px;
            }
            .trwidth{
                 min-width:1000px;
                 max-width: 1300px;

                }
            #Content{
                margin-top: 0px;            
                height: auto;
                border-bottom-left-radius:30px;
                border-bottom-right-radius:30px;              
                min-height:600px;
                max-width: 1300px;     
                background-color:  transparent ;
                background-color: #E6F2FF;
                opacity: 900;

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
           #logoutbg a:link,#logoutbg a:visited
            {
                 color:  #710909;
                 text-decoration: none;
                 background-color:  #729fcf;
                 border-radius: 5px 5px 5px 5px;
            }
           
            #MenuBar tr td li a:Hover
            {
                color: #FFFF82;font-size: 14px;
            }
            .inputfield{
                width: 200px;
                height: 30px;
            }        


            #diablestudent{
                cursor: pointer;

            }
            #displayreport
            {
                min-height: 400px;
                max-height: 530px;
                overflow: auto;
            }
            .reportclass{
                border-right:1px solid #004080;
                color: #004080;
                background-color:  #E6F2FF;
                text-align: center;

            }

            .activelinks{
                background-color: white;   
                height: 30px;


            }
            .hoverlinks{
                background-color: #8699a4;   
                height: 30px;


            }
            #logoutbg a:link, #logoutbg a:visited{
         color: maroon;
        background-color:  #729fcf;        
        border-radius: 10px 10px 10px 10px;
                
            }

 #listyles1
            {
                list-style: none; 
                display: block;
            }
            .inputfields
            {
                width: 250px;
                height: 30px;
                font-family:vijaya;
                color: navy;
            }
            .selectinput{
                height:25px;
                width: 250px;
                align:center;
                color: navy;
                font-style: italic;
           

            }






        </style>
        <title>Automated Cafeteria System</title>
        <link rel="shortcut icon" href="images/food.png" />
        <script src="jquery-1.7.1.min.js"></script>
        <script src="newjavascript.js"></script>
        <script src="jquery.barcode.0.3.js"></script>
        <link href="jquery-ui-1.9.0.custom/css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet">
        <link href="datpick/jsDatePick_ltr.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="datpick/jsDatePick_ltr.min.css" />
        <script src="jquery-ui-1.9.0.custom/js/jquery-1.8.2.js"></script>
        <script src="jquery-ui-1.9.0.custom/js/jquery-ui-1.9.0.custom.js"></script>  
        <script src="datpick/jsDatePick.jquery.min.1.3.js"></script>
        <script type="text/javascript">
            function PrintDivData(crtlid)
            {  
                var ctrlcontent = document.getElementById(crtlid);
                var printscreen = window.open('','','left=1,top=1,width=1,height=1,toolbar=0,scrollbars=0,status=0?');
                printscreen.document.write(ctrlcontent.innerHTML);
                printscreen.document.close();   
                printscreen.focus();
                printscreen.print();
                printscreen.close();
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#Content #tabs" ).tabs();               
                $("#submitacount").click(function(){
                    var fname= $("#firstname").val();
                    var lname= $("#lastname").val();
                    var role= $("#selectrole").val();
                    var cafe= $("#selectcafe").val();
                    var phone= $("#phone").val();
                    var username= $("#username").val();
                    var password= $("#password").val();
                    var vpassword= $("#vpassword").val();               
                    if(fname!='' && lname!=''  && username!='')
                    {   if(role=="")
                        {
                            alert("please select role and cafe number")  
                        }
                        else{
                            
                            
                       
                            if(password!=vpassword)
                            {                         
                                alert("password mis much");
                            }
                    
                            else{
                                if( password.length<6 ||  password.length >=10 )
                                {
                                    alert("weak password");   
                          
                                }else{
                                    $.post("creatAccount.php",{fname:fname,lname:lname,phone:phone,role:role,username:username,password:password,cafe:cafe},
                                    function(data){
                                        $("#displayinfo").html(data);  
                              
                              
                              
                                    });     
                          
                                }
                    
                    
                            }
                        }
                    }else{
                        alert(" Please fill your name");
                    }
                    return false;           
            
                });       
        
                $("#search_id").click(function(){       
                    var id= $("#id_number").val();        
                    if(id=='')
                    {
                        $("#searchresult1").html("<font color=red size=5px>ID field is requerd</font");  
                    }else{
                        $.post("search_byid.php", {id:id}, function(data){                
                            $("#searchresult1").html(data);                
                
                        }) ;
                    }
                    return false;
                });
                $("#displayreport a").click(function(){
                    $('#displayreport  td ').removeClass('activelinks');
                    $("#displayreport td a ").removeClass("activelinks");
                    $(this).parent().addClass('activelinks'); 
                    $(this).addClass("activelinks");
                    var urls= $(this).attr("href");
                    $.post(urls, {id:urls}, function(data){                          
                        $("#resultdisplayadrea").html(data);
                        $("#resultprint").hide();                         
                    })                
                    return false;
                }) ;
                $("#displayreport a").mouseover(function(){                   
                    $(this).parent().addClass('hoverlinks'); 
                    $(this).addClass("hoverlinks");
                   
                }) 
                $("#displayreport a").mouseout(function(){
                    $('#displayreport  td ').removeClass('hoverlinks');
                    $("#displayreport td a ").removeClass("hoverlinks");
                  
                   
                }) 
               
               
               
                $("#Updatepasswordme").click(function(){
                    var username= $("#usernameupdate").val();
                    var current_pass=  $("#passwordupdate").val();
                    var new_pass=  $("#newpassword").val();      
                    var vnew_pass=  $("#vnewpassword").val();
        
                    if(new_pass.length >5 && new_pass.length <11 )
                    {
                        if(new_pass ==vnew_pass)
                        {
                            $.post("reports.php",{username:username,currentpassword:current_pass,newpassword:new_pass}, function(data){
                                $("#updatesuccessDisplay").html(data);
                            })
                    
                        
                        }else{
                            alert("Password miss match");
                        }
             
             
                    }else{
                        alert("please Enter password more than five character length");
                    }
       
    
                });
                     
            });
            
          
        </script>
    </head>    
    <body>
        <?php
        session_start();
        $name = $_SESSION['name'];
        $username = $_SESSION['usernamecsa'];
        $cafnum = $_SESSION['cafenumber'];
        if (isset($_SESSION['usernamecsa'])) {
            ?>
            <div id="Container" >              
                <table   align="center" style="width: 1000px; height:100px; border-radius: 15px 15px 15px 15px;  border: 0px;border-collapse: collapse; cellspacing:0px ;background-color: #E6F2FF;" >
                    <tr>
                        <td class="trwidth" >
                            <div id="MenuBar" align="center" style="font-family:vijaya; font-size:40px; color:#0066FF ;">
                                <table width="100%">
                                    <tr>
                            <td >  <img src="images/cafeteria.png" style="min-width: 1100px; max-width: 1300px; border-radius: 15px 15px 0px 0px;" /><?php
                        //        require_once "clock_final2.php";

            ?> </td>


<!--                                    <td align="center" colspan="2" style="font-family:vijaya; font-size:50px; color:#0066FF" ></td>-->

                                    </tr></table>
                            </div>
                        </td>
                    </tr>
                    <tr class="trwidth"><td>  <div id="Content" style="background-color: #E6F2FF;">
                                <div id="tabs" style="min-height: 700px; ">
                                    <ul style="min-width: 800px; overflow: hidden;max-height: 80px ">
                                        <li ><a href="#CreateAccount">Create Account</a></li>
                                        <li><a href="#updateAccount">Update Account </a></li>
                                        <li><a href="#ControlMembers">Control Members</a></li>                     
                                        <li><a href="#StudentList">Student List</a></li>
                                        <li><a href="#UploadPhoto">Upload Photo</a></li>
                                        <li><a href="#allreport"> Report</a></li>
                                        <li><a href="help.html" target="_blank">Help</a></li>
                                    </ul>


                                    <div id="CreateAccount" >
                                        <div id="logoutbg" align="right"><a href='logout.php'>Logout</a></div>
                                        <form name="accountform"  >
                                            <table align="center" class="tablestyles">
                                                <tr>
                                                    <td>First Name</td> <td><input type="text" name="firstname" id="firstname" class="inputfields"/></td>   
                                                </tr>
                                                <tr> 
                                                    <td>Last Name</td> <td><input type="text" name="firstname" id="lastname" class="inputfields"/></td>
                                                </tr>  
                                                <tr>
                                                    <td>User Role</td> 
                                                    <td><select name="selectroll" id="selectrole" class="selectinput"  >
                                                            <option value=""> ..select user role..</option>
                                                            <option value="Ticker">Cafeteria Ticker </option>
                                                            <option value="Caferia Unit Leader">Cafeteria Unit Leader</option>
                                                            <option value="Cafeteria System Administrator">System Administrator</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cafeteria </td>
                                                    <td><select name="selectcafe" id="selectcafe" class="selectinput">
                                                            <option>..Select cafeteria Number..</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>


                                                        </select>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Phone Number</td><td><input type="text" name="phone" id="phone" class="inputfields"value="+251"/></td>

                                                </tr>
                                                <tr>
                                                    <td>Username</td><td><input type="text" name="username" id="username" class="inputfields"/></td>

                                                </tr>
                                                <tr>
                                                    <td>Password</td><td><input type="password" name="password" id="password" class="inputfields" /></td>

                                                </tr>
                                                <tr>
                                                    <td>verify Password</td><td><input type="password" name="vpassword" id="vpassword" class="inputfields"/></td>

                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="right"><br/>
                                                        <input type="submit" name="submitacount" id="submitacount"  style="width:100px;height: 30px" value="Sign Up"/>
                                                        <input type="reset" value="Clear" style="width:100px;height: 30px" /></td>

                                                </tr>
                                                <tr><td colspan="2" align="center" id="displayinfo"></td></tr> 

                                            </table>
                                        </form>
                                    </div>
                                    <div id="ControlMembers" style="color:#004080">

                                        <table width="100%" height="80%" border="0" bordercolor="#99FFFF" align="center"  style="color:#004080; border: 0" >
                                            <tr>
                                                <td style="vertical-align: top;width:50%;border-right: 1px #006699 solid" id="dislay_unownstudent">
                                                    <div style="width:100%;height: 400px;overflow-x: auto;overflow-y: auto">
                                                        <form name="form2" method="post" enctype="multipart/form-data"  action="disable_non_cafestudent.php">
                                                            <table width="100%" border="0" style="color:#004080;border-collapse: collapse">
                                                                <tr>
                                                                    <td  align="center ">Non-Cafe student list</td>
                                                                    <td ><input type="file" name="fileToUpload" id="fileToUpload" /></td>
                                                                    <td><input type="button"  style="width:100px; hight:30px" value="Upload" onclick="uploadFile2()" /></td>        
                                                                </tr>

                                                                <tr><td id="responce3" align="center" colspan="3">
                                                                        <div id="fileName">   </div>                                                 
                                                                        <div id="fileSize"></div><div id="fileType"></div> <div id="progressNumber"> </div></td>
                                                                </tr>
                                                            </table>                                        
                                                        </form>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: top; padding: 10px">
                                                    <form method="post" name="formid">            
                                                        <table width="100%" border="0"  style="color:#004080">            
                                                            <tr>
                                                                <td >ID Number</td>
                                                                <td ><input type="text" name="idnumber" id="id_number" class="inputfields"/><button id="search_id">Search</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="center" id="searchresult1"></td>

                                                            </tr>
                                                        </table>
                                                    </form>

                                                </td>
                                            </tr>
                                        </table>



                                    </div>
                                    <div id="StudentList">
                                        <form name="listform" method="post" enctype="multipart/form-data" action="uploadexcellist.php" >

                                            <table align="center">
                                                <tr>
                                                    <td>  <p style="color:blue">Select Excel file</p>
                                                        <input type="file" name="fileToUpload2" id="fileToUpload2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="right"><br/><input type="button" name="uploadstudentbutton"  value="Upload" onclick="uploadFile();"/></td>  

                                                </tr>
                                                <tr><td colspan="2" align="right" id="responce4" > <div id="fileName">   </div>                                                 
                                                        <div id="fileSize"></div><div id="fileType"></div> <div id="progressNumber"> </div>  </td></tr>
                                                <tr>  <td  colspan="2" align="center" ><div id="showprogress" style="display:none; overflow-y: auto;max-height: 300px"> Uploading...<img src="images/17.gif"/>       </div > </td></tr>
                                            </table>

                                        </form>
                                    </div>

                                    <div id="UploadPhoto">
                                        <form name="uploadformphoto" method="post" action="updatingphoto_path.php" enctype="multipart/form-data">
                                            <table align="center">
                                                <tr style="color:navy" width="20%">
                                                    <td align="right"> Photo</td><td><input type="file" name="upload[]" id="fileToUpload3"  class="inputfields" multiple="multiple" /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="right"><br/><input type="submit" name="uploadbutton3" id="photoupload" value="Upload photo" /></td>  

                                                </tr>
                                                <tr> <td id="responce5"></td></tr>
                                            </table>
                                        </form>

                                    </div>

                                    <div id="allreport">
                                        <div id="displayreport">
                                            <form  name="reportform"  method="post" >
                                                <table  width="100%" align="right" style=" background-color:  #E6F2FF; border: 0; color: #000066" id="menuitemid">
                                                    <tr  height="30px">
                                                        <td width="35%" class="reportclass" align="left">cafeteria Number <select name="selectcafe2" id="selectcafe2">
                                                                <option value="">...All...</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                            </select></td>
                                                         <td class="reportclass"><a href="cafeteriastatus.php">Cafeterias status</a></td>
                                                        <td class="reportclass"><a href="daily_report.php">Daily Report</a></td>                                                        
                                                        <td class="reportclass"><a href="monthly_report.php">Monthly Report</a></td> 
                                                        <td class="reportclass"><a href="year_report.php">Yearly Report</a></td>
                                                        <td class="reportclass"><a href="Filter Report.php" >Filter Report</a></td> 
                                                        

                                                    </tr>                                       
                                                    <tr style=" border-color: #ffffff;" bgcolor="white"><td colspan="6" align="center" id="resultdisplayadrea"> </td></tr>

                                                </table> 
                                            </form>
                                        </div>                       
                                    </div> 
                                    <div id="updateAccount" style="color:#004080">

                                        <table align="center" class="tablestyles">
                                            <tr>
                                                <td> Name </td>   
                                                <td><input type="text" name="nameupdate" id="nameupdate" class="inputfields" value="<?php echo $name; ?>" disabled="disabled" /></td></tr> 

                                            <tr>
                                                <td> Username </td>   
                                                <td><input type="text" name="usernameupdate" id="usernameupdate" class="inputfields" value="<?php echo $username; ?>" disabled="disabled" /></td></tr>  

                                            <tr> <td> Current Password </td> <td><input type="password" name="passwordupdate" id="passwordupdate" class="inputfields" /> </td> </tr>
                                            <tr><td>New Password </td> <td><input type="password" name="newpassword" id="newpassword" class="inputfields" /> </td></tr>
                                            <tr> <td>Verify New Password </td> <td><input type="password" name="vnewpassword" id="vnewpassword" class="inputfields" /> </td></tr> 
                                            <tr><td colspan="2" align="right"><br/><button id="Updatepasswordme">Update</button></td></tr>
                                            <tr><td colspan="2" align="center" id="updatesuccessDisplay"> </td></tr>

                                        </table>

                                    </div>   

                                </div>
                            </div>
                    <tr>

                    </tr>
                </table>
            </div>
        </body>
        <?php
    } else {
        header("location:index.php");
    }
    ?>
</body>
</html>