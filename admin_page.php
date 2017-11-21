<html>
    <head>
        <link href="../CSS/Styles.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/newDesign.css" type="text/css" rel="stylesheet" />
    </head>
    <body style="padding-right: 50px" class="body_admin" id="fontsALL">
        <h1 class="headers">Welcome Administrator , Time To do something Grim XXX</h1><hr>
        <a class="back" href="../index.php"><h1>Log Out</h1></a>

        <p>
            <h2 class="admin_table">Users Table</h2><hr>
            <table class="admin_table" width="100%">
                <tr>
                    <td>
                        <h3 align="middle">ID</h3>
                    </td>
                    <td>
                        <h3 align="middle">Email</h3>
                    </td>
                    <td>
                        <h3 align="middle" >Password</h3>
                    </td>
                    <td>
                        <h3  align="middle">First Name</h3>
                    </td>
                    <td>
                        <h3 align="middle">Last Name</h3>
                    </td><td>
                        <h3 align="middle">Actions</h3>
                    </td>
                </tr>
                <?php
                    require('functions.php');
                    $cline=return_values('*','users','',1);
                    for($n=0;$n<sizeof($cline);$n++){
                        if($cline[$n][0]!=10){
                            echo '
                            <tr >
                                <td>
                                    <h4 class="e_info"  align="middle">
                                        '.$cline[$n][0].'
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="e_info" align="middle">
                                    '.$cline[$n][1].'
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="e_info" align="middle">
                                    '.$cline[$n][2].'
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="e_info" align="middle">
                                    '.$cline[$n][3].'
                                    </h4>
                                </td>
                                <td>
                                    <h4 class="e_info" align="middle">
                                    '.$cline[$n][4].'
                                    </h4>
                                </td><td>
                                    <h4  align="middle" >
                                        <a class="view_ParticipantsTable" href="admin_page.php?d='.$cline[$n][0].'">Delete</a>
                                    </h4>
                                </td>
                            </tr>
                        ';
                        }
                    }
                ?>
            </table><hr>
            <h2 class="admin_table">
                Deleting a User will:<br>
                    -Be removed From Your Table<br>
                    -Delete Events that this User has participated will be Deleted<br>
                    -Delete Events that this User created will be deleted.<br>
                    -It cannot be undone.
            </h2>
            <?php
                
                if(isset($_GET['d'])){
                    delete_values('users','id='.$_GET['d']);
                    delete_values('events','user_id='.$_GET['d']);
                    delete_values('purchases','participant_id='.$_GET['d']);
                    echo '<meta http-equiv="refresh" content="0; URL=admin_page.php">
                    <meta name="keywords" content="automatic redirection">';
                }
            ?>
        </p>
    </body>
</html>