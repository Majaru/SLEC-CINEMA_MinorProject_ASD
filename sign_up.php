<!DOCTYPE html>
<html>
    <head>
        <title>Register A New Account</title>
        <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
        <link rel="stylesheet" type="text/css" href="../CSS/newDesign.css">
    </head>
    <body class="bodysign_Up" id="fontsALL">
        <h2 class="headers">Register A New Account</h2>
        <div class="sign_Up">
            <!--Page Content-->
            <form action="sign_up.php" method="post">
                <h4>Email</h4>
                    <input type="text" name="email" id="" value="" size="80%">
                <h4>Password</h4>
                    <input type="password" name="password" id="" value="" size="80%">
                <h4>Confirm Password</h4>
                    <input type="password" name="confirm_password" id="" value="" size="80%">
                <h4>First Name</h4>
                    <input type="text" name="first_name" value="" size="80%">
                <h4>Last Name</h4>
                    <input type="text" name="last_name" value="" size="80%">
                    <br><br>
                <button type="submit" value='submit' name='register' class="button">Register</button>
            </form>
        </div>
            <!--Form Processing-->
            <?php
                if(isset($_POST['register']) && $_POST['register']=='submit'){
                    //Assign To variables
                    $message="";
                    $email=$_POST['email'];
                    $pass=$_POST['password'];
                    $cpass=$_POST['confirm_password'];
                    $fname=$_POST['first_name'];
                    $lname=$_POST['last_name'];
                    //Validate
                    $valid=true;
                    if(strlen($email)<1){
                        $valid=false;
                        echo '<meta http-equiv="refresh" content="0; URL=sign_up.php?s=1">
                        <meta name="keywords" content="automatic redirection">';
                    }else if(strlen($pass)<9){
                        $valid=false;
                        echo '<meta http-equiv="refresh" content="0; URL=sign_up.php?s=2">
                        <meta name="keywords" content="automatic redirection">';
                    }else if(strlen($cpass)<9 || $pass!=$cpass){
                        $valid=false;
                        echo '<meta http-equiv="refresh" content="0; URL=sign_up.php?s=3">
                        <meta name="keywords" content="automatic redirection">';
                    }else if(strlen($fname)<1){
                        $valid=false;
                        echo '<meta http-equiv="refresh" content="0; URL=sign_up.php?s=4">
                        <meta name="keywords" content="automatic redirection">';
                    }else if(strlen($lname)<1){
                        $valid=false;
                        echo '<meta http-equiv="refresh" content="0; URL=sign_up.php?s=5">
                        <meta name="keywords" content="automatic redirection">';
                    }
                    if($valid==true){
                        echo"<br><h3>Saving User</h3>";
                    }
                    //Save to database
                    include('functions.php');
                    //Redirect
                    if($valid==true){
                        $valid=add_to('users','email,password,fname,lname',"'".$email."','".$pass."','".$fname."','".$lname."'");
                        echo 'Redirecting...';
                        echo '<html><body>
                                <meta http-equiv="refresh" content="2; URL=../index.php">
                                <meta name="keywords" content="automatic redirection">
                            </body></html>';
                    }
                }
                if (isset($_GET['s'])) {
                    switch($_GET['s']){
                        case 1:{
                            echo'<h3 id="error_message" width="30" >Please Enter your Email.<h3>';
                            break;
                        }case 2:{
                            echo'<h3 id="error_message" width="30" >Password must be at least 9 characters long.<h3>';
                            break;
                        }case 3:{
                            echo'<h3 id="error_message" width="30" >Passwords do not match.<h3>';
                            break;
                        }case 4:{
                            echo'<h3 id="error_message" width="30" >Please Input your First Name.<h3>';
                            break;
                        }case 5:{
                            echo'<h3 id="error_message" width="30" >Please Input your Last Name.<h3>';
                            break;
                        }
                    }
                    
                }
            ?>
        </div>
    </body>
</html>