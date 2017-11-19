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
            </form>
            </div>
        <!--Form Processing-->
        
    </body>
</html>
