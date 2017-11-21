<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
        <link href="../CSS/Styles.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/Design.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/newDesign.css" type="text/css" rel="stylesheet" />
        <link href="../CSS/FinalStylesCSS.css" type="text/css" rel="stylesheet" />
    </head>
    <body style="padding-right: 50px" id="fontsALL">
        
        <h1 class="headers">Choose Payment Method</h1>
        <?php
            echo '<form action="join_event.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'" method="post">
                            <button class="back" type="submit">Back</button>
                        </form>';
        ?>
        <table  class="others2" width="100%">
            <tr>
                <td width="35%">
                    <h2 align="middle">Pay Upon Walk-In</h2>
                    <?php
                        echo '<h2 align="middle"><a class="back" href="payment.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'&w=walk">Walk-In Payment</a></h2>';
                    ?>
                </td>
                <td width="10%">
                      <h2 align="middle">OR</h2>
                </td>
                <td width="45%">
                    <h2 align="middle">Credit Card</h2>
                    <?php
                        echo '<form action="payment.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'" method="post">';
                    ?>
                        <h3>Card Number</h3>
                            <input type="number" value="" name="card_num" size="100">
                        <h3>Pin Number</h3>
                        <input type="number" name="pin" id="" value=""><br><br>
                            <button class="back" type="submit" name="submit" value="pay">Submit</button>
                    </form>
                </td>
            </tr>
        </table>
        <?php
            require('functions.php');
            // Assign Variables
            $cline=return_values('*','events','where id="'.$_GET['e'].'"',2);
            $admin_id=$cline[0][12];
            $parti_id=$_GET['i'];
            $name=$_GET['n'];
            $e_id=$_GET['e'];
            $e_title=$cline[0][1];
            $e_start=$cline[0][4];
            //Redirect
            if(isset($_POST['submit'])){
                echo 'Purchase';
                add_to('purchases','admin_id,participant_id,name,event_id,event_title,event_start,payment',"'".$admin_id."','".$parti_id."','".$name."','".$e_id."','".$e_title."','".$e_start."','CC'");
                echo '<html><body>
                            <h1>Registering Purchase...Redirecting...</h1>
                            <meta http-equiv="refresh" content="1; URL=../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
            }
            if(isset($_GET['w'])){
                echo 'Walk In';
                add_to('purchases','admin_id,participant_id,name,event_id,event_title,event_start,payment',"'".$admin_id."','".$parti_id."','".$name."','".$e_id."','".$e_title."','".$e_start."','WI'");
                echo '<html><body>
                            <h1>Registering Purchase...Redirecting...</h1>
                            <meta http-equiv="refresh" content="1; URL=../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
            }
        ?>
    </body>
</html>