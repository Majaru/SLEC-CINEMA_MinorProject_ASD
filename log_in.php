<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
        <link href="../CSS/Styles.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/Design.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/newDesign.css" type="text/css" rel="stylesheet" />
        <style>
           .vl {
                border-left: 1px solid white;
                height: 270px;
                position: absolute;
                left: 56%;
                margin-left: -3px;
                top: 9%;
            }
        </style>
    </head>
    <body class="bodyLog_in" id="fontsALL">
        


        <h2 class="headers">Log In With Your Account</h2>
            
            <div class="log_in_forms_for_Log_in">
                <div class="registerHere">Don't have an Account?<br><br> 
                &nbsp&nbsp&nbsp&nbsp<a href="sign_up.php" class="back" >Sign Up</a>
            </div>
            <div class = "vl"></div>

                <form action="log_in.php" method="post">
                <div>
                    <h3 ><font color="white">Email </font></h3>
                </div>
                    <input type="text" name="user_name" value="" size="80%">
                <h3><font color="white">Password </font></h3>
                    <input type="password" name="user_password" value="" size="80%">
                <br><br>
                <button type="submit" name="submit" value="login" class="button" >Log In</button>
                <?php
                    include('functions.php');
                    if(isset($_POST['submit']) && $_POST['submit']=='login'){
                        //Assign
                        $email=$_POST['user_name'];
                        $pass=$_POST['user_password'];
                        //Retrive
                        $cline=return_values('*','users','where email="'.$email.'"',1);
                        //Validate
                        $valid=true;
                        if(sizeof($cline)<1){
                            $valid=false;
                        }else if($pass!=$cline[0][2]){
                            $valid=false;
                        }
                        //Redirect
                        if($valid==true){
                            if($cline[0][1]=='admin' && $cline[0][2]=='admin' && $cline[0][3]=='Administrator' && $cline[0][4]=='Rights'){
                                echo '<html><body>
                                    <meta http-equiv="refresh" content="0; URL=admin_page.php">
                                    <meta name="keywords" content="automatic redirection">
                                </body></html>';
                            }else{
                                echo '<html><body>
                                    <meta http-equiv="refresh" content="0; URL=../index.php?n='.$cline[0][3].'&i='.$cline[0][0].'">
                                    <meta name="keywords" content="automatic redirection">
                                </body></html>';
                            } 
                        }else if ($valid==false) {
                            echo'<h3 id="error_message" width="30" >No User Was Found.<h3>';
                        }
                    }
                ?>
            </form>
            </div>
        <!--Form Processing-->
        
    </body>
</html>
