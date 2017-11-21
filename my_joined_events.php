<html>
    <head>
        <link href="../CSS/Styles.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/Design.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/newDesign.css" type="text/css" rel="stylesheet" />
    </head>

    <body style="padding-right: 50px" class="bodyMy_Joined_Events" id="fontsALL">
        <h1 class="headers">My Joined Events</h1>
        <?php
        
            echo '<form action="../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">
                <button type="submit" class="back">Back</button>
            </form>
            <form action="add_image.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">';
        ?>

        <table class="my_Joined_EventsTable" width="100%">
            <tr>
                <td>
                    <h2 class="e_info">Event Title</h2>
                </td><td>
                    <h2 class="e_info">Event Time</h2>
                </td><td>
                    <h2 class="e_info" align="middle">Payment</h2>
                </td><td>
                    <h2 class="e_info" >Actions</h2>
                </td>
            </tr>
            <?php
                require('functions.php');
                $cline=return_values("*","purchases","where participant_id='".$_GET['i']."'",3);
                for ($n=0; $n < sizeof($cline); $n++) { 
                    //Translating Time//
                    $time1=explode(':',$cline[$n][6]);
                    echo '<tr ';
                    if($n%2==0){
                        echo 'id="even"';
                    }else{
                        echo 'id="odd"';
                    }
                    echo '>
                            <td>
                                <a style="text-decoration: none;" href="join_event.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$cline[$n][4].'"><h3 class="e_info">'.$cline[$n][5].'</h3></a>
                            </td><td width="15%">
                                <h3 class="e_info" >'.$time1[0].':'.$time1[1].' '.$time1[2].'</h3>
                            </td>
                            <td width="15%" align="middle">';

                            if($cline[$n][7]=='WI'){
                                echo '<img src="../images/ex.png" alt=""  width="20%">';
                            }else{
                                echo '<img src="../images/check.png" alt=""  width="20%">';
                            }  

                    echo '</td>
                            <td width="24%">
                                <h3 class="e_info" align="right" >
                                    <a style="text-decoration: none;" href="my_joined_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'&d='.$cline[$n][0].'" id="right">Leave Event</a>
                                    <a id="right"> | </a>
                                    <a style="text-decoration: none;" href="change_payment.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$cline[$n][4].'" id="right">Change Payment</a>
                                </h3>
                            </td>
                        </tr>   
                    ';
                }
                if(isset($_GET['d'])){
                    //Retrieve Data
                    $cline = return_values('*','purchases',"where id='".$_GET['d']."'",3);
                    //Delete
                    delete_values("purchases","id=".$_GET['d']."");
                    //Redirect
                    echo '<html><body>
                            <meta http-equiv="refresh" content="0; URL=my_joined_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
                }
            ?>
        </table>
    </body>
</html>