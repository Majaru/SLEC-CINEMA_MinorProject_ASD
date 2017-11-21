<html>
    <head>
    <link href="../CSS/Styles.css" type="text/css" rel="stylesheet" />
    <link href="../CSS/Design.css" type="text/css" rel="stylesheet" />
    <link href="../CSS/newDesign.css" type="text/css" rel="stylesheet" />
    </head>
    <body style="padding-right: 50px" class="bodyJoin_event" id="fontsALL">
        <h1 class="headers">Join Event</h1><hr>

        <?php
            //Load Details
            require('functions.php');
            echo '<form action="../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">
                            <button class="back" type="submit">Back</button>
                        </form>';
            if(isset($_GET['e'])){
                //Fetch Values
                $cline=return_values('*','events','where id="'.$_GET['e'].'"',2);
                $cline2=return_values('*','purchases','where event_id='.$_GET['e'].' && participant_id="'.$_GET['i'].'"',3);
                if(sizeof($cline)>0){
                    //Show Details
                    //Translating the date
                    $temp=explode('@',$cline[0][3]);
                    $date1=explode('/',$temp[0]);
                    $date2=explode('/',$temp[1]);
                    //Translating Time//
                    $time1=explode(':',$cline[0][4]);
                    $time2=explode(':',$cline[0][5]);
                    echo '
                    <table width="80%" class="join_eventsTable" >
                        <tr>
                        <td width="50%">
                         <img /* width="100%" height ="300" */ src="data:image;base64,'.$cline[0][10].'" alt="No Event Image.">
                        </td>
                        <td>
                        <h2 class="e_info">Event Title: '.$cline[0][1].'</h2>
                        <h3 class="e_info">Location: '.$cline[0][2].'</h3>
                        <h4 class="e_info">Date: '.return_month($date1[0]).' '.$date1[1].', '.$date1[2].' - '.return_month($date2[0]).' '.$date2[1].', '.$date2[2].'</h4>
                        <h4 class="e_info">Time: '.$time1[0].':'.$time1[1].' '.$time1[2].' - '.$time2[0].':'.$time2[1].' '.$time2[2].'</h4><br>
                        <h4 class="e_info">Event Details:<br>'.$cline[0][6].'</h4><br>
                        <h3 class="e_info">Organizer: '.$cline[0][7].'</h3>
                        <h4 class="e_info">'.$cline[0][8].'</h4><br>
                        <h3 class="e_info">Ticket Price : Php '.$cline[0][9].'</h3><br>
                        

                    
                    ';
                    if($_GET['i']!=$cline[0][12] && sizeof($cline2)<1){
                        echo '
                            <form action="payment.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'" method="post">
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <button class="back" type="submit" name="join" value="submit">Join Event</button>
                            </form>
                        ';
                    }else{
                        
                        if(sizeof($cline2)>0){
                            echo "<h4>You are already Registered on this Event.</h4>";
                        }else{
                            echo "<h4>You are not allowed to Register in your Own Event. It's already free.</h4>";
                        }
                    }
                    
                }
            }
            if(isset($_POST['join'])){
                echo 'Forms Submitted';
            } 
             echo' 
             </td>
                </tr>
             </table>
             ';
        ?>
    </body>
</html>