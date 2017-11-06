<!DOCTYPE html>
<html>
    <head>
        <link href="Styles.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <h1>Log In with You Account</h1>
        <form action="" method="post" id="sign_up_forms">
            <h2>User Name:<br><input type="text" name="l_name" value="" id="loginFields" maxlength="30"></h2>
            <h2>Password:<br><input type="password" name="l_password" value="" id="loginFields" maxlength="30"></h2>
            
            <input id="btn_submit" type="submit" value="Log In" name="submit_forms"<br><br>
        </form>
        <?php
            include_once('show_movies.php');
            if(isset($_POST['submit_forms']) && $_POST['submit_forms']=='Log In'){
                $userInfo=log_in($_POST['l_name'],$_POST['l_password']);
                $name=urlencode($userInfo[0][2]);
                $access=urlencode($userInfo[0][3]);
                echo $name;
                //send data
                header('Location: index.php?log=loggedin&access='.$access.'&name='.$name);
                exit;
            }else{

            }
        ?>
    </body>
</html>