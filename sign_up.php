
<?php
    global $error;
    
    function add_user($screenName, $name, $password, $cardNumber){
        $db = mysqli_connect("localhost", "root", "", "cinema_db");
            //$password = md5($password);
        $query = "INSERT INTO users (name, user_name, password, card_number, balance, access) ";
        $query .= "VALUES ('{$screenName}', '{$name}', '{$password}', '{$cardNumber}' , 500, 'user')";
        $result = mysqli_query($db,$query);
        if($result){
             header('Location: index.php?log=loggedin&access=user'.'&name='.$screenName); 
        }else{
            header("location: sign_up.php");
        }
        
    }
 
?>

<!DOCTYPE html>
<html>
    <header>
        <link href="Styles.css" type="text/css" rel="stylesheet" />
    </header>
    <body>
     
        
    <ul>
            <!--Headers-->
            <li><a href="index.php" id="logo">Cinema Website</a></li>
            <?php
                include('show_movies.php');
                $admin=true ;
                if($admin==false){
                    echo '<li><a href=""id="buttons">Log Out</a></li>';
                }else{
                    echo '<li><a href="log_in.php" id="buttons"><b>Log In</b></a></li>
                          <b>';
                }
            ?>

    </ul>
        <h1>Sign Up to get started.</h1><br>
        <p>
            <form action="sign_up.php" method="post" id="sign_up_forms">
                <h2>User Name:<br><input type="text" name="u_name" value="" id="loginFields" maxlength="30"></h2>
                <h2>Password: (min. of 8 characters)<br><input type="password" name="u_password" id="loginFields"></h2>
                <h2>Confirm Password: <br><input type="password" name="u_password2" id="loginFields"></h2>
                <h2>Screen Name: <br><input type="text" name="u_screenName" id="loginFields" maxlength="30"></h2>


                <h2>
                    Credit Card Number: <br><input type="text" name="c1" id="credit_card" maxlength="4" value="">
                     - <input type="text" name="c2" id="credit_card" maxlength="4" value="">
                     - <input type="text" name="c3" id="credit_card" maxlength="4" value="">
                     - <input type="text" name="c4" id="credit_card" maxlength="4" value="">
                </h2>

                <!--Display Error Message Here-->
                <?php
                    if(isset($_POST['submit_forms'])){
                        // Name
                        if(strlen($_POST['u_name'])>0){
                            // Password
                            if(strlen($_POST['u_password'])>0){
                                // match passwords
                                if($_POST['u_password']==$_POST['u_password2']){
                                    //Screen Name
                                    if(strlen($_POST['u_screenName'])>0){
                                        //Credit Card if i-add siya by 1, kay mabawasan ang legth sa string, meaning invalid number siya
                                        $c1=$_POST['c1']+1;
                                        $c2=$_POST['c2']+1;
                                        $c3=$_POST['c3']+1;
                                        $c4=$_POST['c4']+1;
                                        if(strlen($c1)==4 && strlen($c2)==4 && strlen($c3)==4 && strlen($c4)==4){
                                            //Send To database
                                            $name=$_POST['u_name'];
                                            $password=$_POST['u_password'];
                                            $screenName=$_POST['u_screenName'];
                                            $cardNumber=$_POST['c1']."-".$_POST['c2']."-".$_POST['c3']."-".$_POST['c4'];
                                            echo $cardNumber;
                                            add_user($screenName,$name,$password, $cardNumber);
                                        }else{
                                            echo "<h3>Invalid Card Number</h3>";
                                        }
                                    }else{
                                        echo "<h3>Please Input A Screen Name.</h3>";
                                    }
                                }else{
                                    echo "<h3>Passwords do not match.</h3>";
                                }
                            }else{
                                echo "<h3>Password is required.</h3>";
                            }
                        }else{
                            echo "<h3>Please Input A Name.</h3>";
                        }
                        //echo $_POST['u_name'].$_POST['u_password'].$_POST['u_screenName'];
                        
                    }else{
                        echo "<h3>Please Fill-Up all Fields.</h3>";
                    }
                    
                ?>


                <input id="btn_submit" type="submit" value="Submit" name="submit_forms"<br><br>
            </form>
            <br><br>
            <img src="images/credit_cards.jpg" alt="" id="sign_up_forms">
            

        </p>
        <div>
            <?php echo $error; ?>
        </div>
    </body>
</html>