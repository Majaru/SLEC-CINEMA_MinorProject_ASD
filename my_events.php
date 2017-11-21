<html>
    <head>
        <link href="../CSS/Styles.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
        <link rel="stylesheet" type="text/css" href="../CSS/newDesign.css">
    </head>
    <body  style="padding-right: 50px" class="bodyMy_Events" id="fontsALL">
        <h1 class="headers">My Events</h1>
        <?php
            $send_id="";
            if(isset($_GET['e'])){
                $send_id="&e=".$_GET['e']."";
            }
            echo '<form action="../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">
            <button class="back" type="submit">Back</button>
        </form>
        <form action="update_image.php?n='.$_GET['n'].'&i='.$_GET['i'].$send_id.'" method="post">';
        ?>
        <!--
        <table border="2" width="100%">
            <td width="25%">
                Image Here
            </td>
            <td >
                <br>
                <h2 class="e_info">Title </h2>
                <h4 class="e_info">Location</h4>
                <h5 class="e_info">Date | Time</h5>
                <br>
                <h4 class="e_info">Event Details:</h4>
                <textarea disabled="disabled" name="details" class="e_info" cols="100%" rows="1%">Details\nASDASDASD\n</textarea>
                <br>
                <br>
                <h3 class="e_info">Organizer</h3>
                <h4 class="e_info">Organizer Details:</h4>
                <textarea disabled=" disabled" name="org_details" class="e_info" cols="100%" rows="1%"></textarea>
                <br><br>
                <h3 class="e_info"><a href="">Update Event</a> | <a href="">Delete Event</a></h3>
                <br>
            </td>
        </table>
        <hr>
        -->
        <?php
            require('functions.php');
            if(isset($_GET['i'])){
                $cline=return_values('*','events',"where user_id='".$_GET['i']."'",2);

                if(sizeof($cline)>0){
                    for ($n=0; $n < sizeof($cline); $n++) {
                        //Translating the date
                        $temp=explode('@',$cline[$n][3]);
                        $date1=explode('/',$temp[0]);
                        $date2=explode('/',$temp[1]);
                        //Translating Time//
                        $time1=explode(':',$cline[$n][4]);
                        $time2=explode(':',$cline[$n][5]);
                        echo '
                        <table class= "my_eventsTable" width="100%">
                            <td width="25%" >
                                <img /* width="100%"*/ src="data:image;base64,'.$cline[$n][10].'" alt="No Event Image.">
                            </td>
                            <td >
                                <h2 class="e_info"><br>'.$cline[$n][1].'</h2>
                                <h4 class="e_info">'.$cline[$n][2].'</h4>
                                <h5 class="e_info">'.return_month($date1[0]).' '.$date1[1].', '.$date1[2].' - '.return_month($date2[0]).' '.$date2[1].', '.$date2[2].' | 
                                    '.$time1[0].':'.$time1[1].' '.$time1[2].' - '.$time2[0].':'.$time2[1].' '.$time2[2].'
                                </h5>
                                <br>
                                <h4 class="e_info">Event Details:</h4>
                                <textarea disabled="disabled" name="details" class="e_info" cols="100%" rows="1%">'.$cline[$n][6].'</textarea>
                                <br>
                                <br>
                                <h3 class="e_info">'.$cline[$n][7].'</h3>
                                <h4 class="e_info">Organizer Details:</h4>
                                <textarea disabled=" disabled" name="org_details" class="e_info" cols="100%" rows="1%">'.$cline[$n][8].'</textarea>
                                <br><br>
                                <h4 class="e_info">Tags:</h4>
                                <h3 class="e_info">#'.return_type($cline[$n][13]).' | #'.return_topic($cline[$n][14]).'</h3>
                                <br>
                                <h3 id="right">
                                <a class="actions" href="update_event.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$cline[$n][0].'">Update Event</a> 
                                <a class="actions" style="text-decoration: none;" href="my_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$cline[$n][0].'">Delete Event</a>
                                <a class="actions" style="text-decoration: none;" href="view_participants.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$cline[$n][0].'">View Event Participants</a></h3>
                            </td><br><br>
                        </table>
                        ';
                    }
                }else{
                    echo "<h1>Ooops...We've come up empty..Please Create an Event.</h1>";
                }
            }
            if(isset($_GET['e'])){
                delete_values('events',"id='".$_GET['e']."'");
                echo '<html><body>
                            <h1>Deleting Event..Redirecting..</h1>
                            <meta http-equiv="refresh" content="1; URL=my_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
            }
        ?>
        <br>
    </body>
</html>