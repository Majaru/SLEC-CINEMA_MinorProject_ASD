<html>
    <head>
         <link href="../CSS/Styles.css" type="text/css" rel="stylesheet" />
         <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
         <link rel="stylesheet" type="text/css" href="../CSS/newDesign.css">
    </head>
    <body style="padding-right: 50px" class="bodyview_Participants" id="fontsALL">
        <h1 class="headers">View Event Participants</h1>
        <?php
            echo    '<form action="my_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">
                        <button class="back" type="submit">Back</button>
                    </form>';
        ?>
        <table class="view_ParticipantsTable" width="100%">
            <tr>
                <td>
                    <h2 class="e_info" align="middle">Attendee Name</h2>
                </td>
                <td>
                    <h2 class="e_info" align="middle">Event Title</h2>
                </td>
                <td>
                    <h2 class="e_info" align="middle">Event Time</h2>
                </td>
                <td>
                    <h2 class="e_info" align="middle">Payment</h2>
                </td>
                <td>
                    <h2 class="e_info" align="middle">Actions</h2>
                </td>
            </tr>
            
            <?php
                //Retrieve Values
                require('functions.php');
                if(isset($_GET['e'])){
                    $cline=return_values('*','purchases',"where event_id='".$_GET['e']."'",3);
                    //Load Values
                    for ($n=0; $n < sizeof($cline); $n++) { 
                        echo '<tr ';
                        if($n%2==0){
                            echo 'id="odd"';
                        }else{
                            echo 'id="even"';
                        }
                        echo '>
                                <td width="25%">
                                    <h3 class="e_info">'.$cline[$n][3].'</h3>
                                </td>
                                <td width="25%">
                                    <h3 class="e_info">'.$cline[$n][5].'</h3>
                                </td>
                                <td width="15%">
                                    <h3 class="e_info">'.$cline[$n][6].'</h3>
                                </td>
                                <td width="10%">
                                    <h3 class="e_info">';
                        if($cline[$n][7]=='WI'){
                            echo '<img src="../images/ex.png" alt=""  width="25%">';
                        }else{
                            echo '<img src="../images/check.png" alt=""  width="25%">';
                        }
                        echo
                                    '</h3>
                                </td>
                                <td>
                                    <h3 class="e_info">
                                        <h3 class="e_info" align="left"><a href="view_participants.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'$d='.$cline[$n][0].'">Delete Participant</a></h3>
                                    </h3>
                                </td>
                            </tr>
                        ';
                    }
                }
            ?>
            <a href=""></a>
        </table>
    </body>
</html>