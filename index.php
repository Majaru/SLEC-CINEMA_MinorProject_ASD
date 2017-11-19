<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="CSS/newDesign.css" type="text/css" rel="stylesheet" />
    <link href="CSS/Design.css" type="text/css" rel="stylesheet" />
    <link href="CSS/Styles.css" type="text/css" rel="stylesheet" />
    <link href="CSS/FinalStylesCSS.css" type="text/css" rel="stylesheet" />
    <style>
        .containerImg {
          position: relative;
        }

        .imageImg {
          display: block;
          width: 100%;
          height: auto;
        }

        .overlayImg {
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          height: 100%;
          width: 100%;
          opacity: 0;
          transition: .5s ease; 
          filter: alpha(opacity=90);
          background-color: #AE6400;
        }

        .containerImg:hover .overlayImg {
          opacity: 1;
        }

        .textImg {
          color: white;
          font-size: 20px;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
        }
    </style>

</head>
<body >
	
  	<div class="transbox">
   		<p>S</p>
 	</div>
 	<div class="posNav">
 		<p class="slec"> &nbspSLEC Event Manager</p>
	</div>


	<div class="posiNav">
        
        <?php
                        require('php/functions.php');


                        if(isset($_POST['tosearch'])){
                            $cline = return_values('*','events',"where title like '%".$_POST['tosearch']."%' || location like '%".$_POST['tosearch']."%' || organizer like '%".$_POST['tosearch']."%' || e_type like '%".$_POST['tosearch']."%' || e_topic like '%".$_POST['tosearch']."%' ",2);
                        }else{
                            $cline = return_values('*','events','',2);
                        }
                        if(isset($_GET['n'])){
                            echo '
                            <ul class="topnav3">
                            <li style = ""><a>Welcome, '.$_GET['n'].'</a></li>
                            <li><a href="php/create_event.php?n='.$_GET['n'].'&i='.$_GET['i'].'">Create Event</a></li>
                            <li><a href="php/my_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'">My Events</a></li>      
                            <li><a href="php/my_joined_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'">My Joined Events</a></li>
                            <li style = "float: right"></li>
                            <li style = ""><a href="index.php">Log Out</a></li>
                            
                            
                            </ul>';

                        }else{
                            echo '
                                    <ul class="topnav">
                                    <li><a href="php/log_in.php">Log In</a></li>
                                    <li style="float: center"><a href="php/sign_up.php">Sign Up</a></li>
                                    <li class="icon">
                                        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                                     </li>
                                    </ul>

                                ';
                            //echo '<a href="" id="right">Sign Up</a>
                              //  <a href="" id="right">Log In</a>';
                        }
                    ?>


            

	</div>

	
    
    <?php
                    if(isset($_GET['n'])){
                        echo '
                        <form action="index.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">
                            <div class="search">
                             <input type="text" name="tosearch" placeholder="Search Events">
                              <button class="back" type="submit" value="search" name="search">Search</button>
                             
                            </div>  
                        </form>
                        ';
                    }else{
                        echo '
                        <form action="index.php" method="post">
                            <div class="search">
                             <input type="text" name="tosearch" placeholder="Search Events">
                              <button class="back" type="submit" value="search" name="search">Search</button>
                             
                            </div> 
                        </form>
                    ';
                    }
                ?>
	
    <br><br><br><br>

	<?php
                for ($n=0; $n < sizeof($cline);$n++) { 
                    //Translating the date
                    $temp=explode('@',$cline[$n][3]);
                    $date1=explode('/',$temp[0]);
                    $date2=explode('/',$temp[1]);
                    //Translating Time//
                    $time1=explode(':',$cline[$n][4]);
                    $time2=explode(':',$cline[$n][5]);
                                if(isset($_GET['i'])){
                                    echo '<center><table width="31.5%" class="others" >
                                    <tr>
                                        <td>
                                            <a href="php/join_event.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$cline[$n][0].'">
                                            <div class="containerImg">
                                              <img /* width="100%" height ="300"*/ src="data:image;base64,'.$cline[$n][10].'" alt="No Event Image.">
                                              <div class="overlayImg">
                                                <div class="textImg">'.$cline[$n][6].'</div>
                                              </div>
                                            </div>
                                            </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="e_info">'.return_month($date1[0]).' '.$date1[1].', '.$date1[2].'</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="e_info">'.$cline[$n][1].'</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="e_info">'.$cline[$n][2].'</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                            <h5 class="e_info">#'.return_type($cline[$n][13]).' | #'.return_topic($cline[$n][14]).'</h5>
                                            <hr>
                                        </td>
                                    </tr>
                                ';
                                    echo    '<tr><td>
                                                <div align="center" id="bois" width="100%"><a href="php/join_event.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$cline[$n][0].'">Join Event</a></div>
                                            </td>
                                                
                                            </tr>';
                                }else{
                                    echo '<center><table width="31.5%" class="others" >
                                    <tr>
                                        <td>
                                            <a>
                                            <div class="containerImg">
                                              <img /* width="100%" height ="300"*/ src="data:image;base64,'.$cline[$n][10].'" alt="No Event Image.">
                                              <div class="overlayImg">
                                                <div class="textImg">'.$cline[$n][6].'</div>
                                              </div>
                                            </div>
                                            </div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h4 class="e_info">'.return_month($date1[0]).' '.$date1[1].', '.$date1[2].'</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="e_info">'.$cline[$n][1].'</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="e_info">'.$cline[$n][2].'</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                            <h5 class="e_info">#'.return_type($cline[$n][13]).' | #'.return_topic($cline[$n][14]).'</h5>
                                            <hr>
                                        </td>
                                    </tr>
                                ';
                                }
                                echo '</table></center>';
                        }
            ?>
		


</body>
</html>