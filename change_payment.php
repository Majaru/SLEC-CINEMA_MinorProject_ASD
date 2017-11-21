<html>
    <head>
        <link href="../CSS/newDesign.css" type="text/css" rel="stylesheet" />
    </head>
    <body style="padding-right: 50px" class="bodyChange_payment" id="fontsALL">
        
        <h1 class="headers">Choose Payment Method</h1>
        <?php
            echo '<form action="join_event.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'" method="post">
                            <button type="submit" class="back">Back</button>
                        </form>';
        ?>
        <table class="others2" width="100%">
            <tr>
                <td width="35%">
                    <h2 align="middle">Pay Upon Walk-In</h2>
                    <?php
                        echo '<h2 align="middle"><a class="back" href="change_payment.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'&w=walk">Walk-In Payment</a></h2>';
                    ?>
                </td>
                <td width="10%">
                      <h2 align="middle">OR</h2>
                </td>

                <td width="45%">
                    <h2 align="middle"><font color="">Credit Card</font></h2>
                    <?php
                        echo '<form action="change_payment.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'" method="post">';
                    ?>
                        <h3><font color="">Card Number</font></h3>
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
            $cline=return_values('*','purchases','where event_id="'.$_GET['e'].'" && participant_id="'.$_GET['i'].'"',3);
            //Redirect
            if(isset($_POST['submit'])){
                echo 'Purchase';
                update_values('purchases',"payment='CC'",'id='.$cline[0][0]);
                echo '<html><body>
                            <h1>Registering Purchase...Redirecting...</h1>
                            <meta http-equiv="refresh" content="1; URL=../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
            }
            if(isset($_GET['w'])){
                echo 'Walk In';
                update_values('purchases',"payment='WI'",'id='.$cline[0][0]);
                echo '<html><body>
                            <h1>Registering Purchase...Redirecting...</h1>
                            <meta http-equiv="refresh" content="1; URL=../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
            }
        ?>
    </body>
</html>