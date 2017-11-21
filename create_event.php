<html>
    <head>
        <title>Create Event</title>
        <link rel="stylesheet" type="text/css" href="../CSS/Designs.css">
        <link rel="stylesheet" type="text/css" href="../CSS/newDesign.css">
    </head>
    
    <body style="padding-right: 50px" class="bodyCreate_event" id="fontsALL">

        <div class="fontsALL">
        <h1 class="headers">Create Event</h1>
        <?php
            require('functions.php');
            echo '<form action="../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">
                <button type="submit" class="back">Back</button>
            </form>
            <div id="log_in_forms2">
            <form action="add_image.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">';
        ?>

        <div class="others3">
            <h2>Event Title:</h2>
                <input type="text" name="title" id="" maxlength="500" size="100%">
            <h2>Location:</h2>
                <input type="text" name="place" id="" value="" size="100%">
            <!--Start-->
            <table>
                    <tr>
                        <td class="treb">
                                <p><h2 class="e_info">Start</h2>
                        Date: 
                            <select name="month1" id="">
                                <?php
                                    for($n=1;$n<13;$n++){
                                        echo '<option value="'.$n.'">'.return_month($n).'</option>';
                                    }
                                ?>
                            </select>
                            <select name="day1" id="">
                                <?php
                                    for($n=1;$n<32;$n++){
                                        echo '<option value="'.$n.'">'.$n.'</option>';
                                    }
                                ?>
                            </select>
                            <select name="year1" id="">
                                <?php
                                    for($n=2000;$n<2050;$n++){
                                        echo '<option value="'.$n.'">'.$n.'</option>';
                                    }
                                ?>
                            </select><br>Time 
                            <select name="hh1" id="">
                                <?php
                                    for($n=1;$n<13;$n++){
                                        if($n<10){
                                            echo '<option value="0'.$n.'">0'.$n.'</option>';
                                        }else{
                                            echo '<option value="'.$n.'">'.$n.'</option>';
                                        }
                                    }
                                ?>
                        </select> :
                        <select name="mm1" id="">
                            <?php
                                for($n=0;$n<60;$n++){
                                    if($n<10){
                                        echo '<option value="0'.$n.'">0'.$n.'</option>';
                                    }else{
                                        echo '<option value="'.$n.'">'.$n.'</option>';
                                    }
                                    
                                }
                            ?>
                        </select> :
                        <select name="time1" id="">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                        </p>
                        <!--END-->
                        
                        <p>
                        </td>
                        <td width="10%"></td>
                        <td>
                        <h2 class="e_info">End</h2>
                    Date: 
                        <select name="month2" id="">
                            <?php
                                for($n=1;$n<13;$n++){
                                    echo '<option value="'.$n.'">'.return_month($n).'</option>';
                                }
                            ?>
                        </select>
                        <select name="day2" id="">
                            <?php
                                for($n=1;$n<32;$n++){
                                    echo '<option value="'.$n.'">'.$n.'</option>';
                                }
                            ?>
                        </select>
                        <select name="year2" id="">
                            <?php
                                for($n=2000;$n<2050;$n++){
                                    echo '<option value="'.$n.'">'.$n.'</option>';
                                }
                            ?>
                        </select><br> Time 
                    <select name="hh2" id="">
                        <?php
                            for($n=1;$n<13;$n++){
                                if($n<10){
                                    echo '<option value="0'.$n.'">0'.$n.'</option>';
                                }else{
                                    echo '<option value="'.$n.'">'.$n.'</option>';
                                }
                            }
                        ?>
                </select> :
                <select name="mm2" id="">
                    <?php
                        for($n=0;$n<60;$n++){
                            if($n<10){
                                echo '<option value="0'.$n.'">0'.$n.'</option>';
                            }else{
                                echo '<option value="'.$n.'">'.$n.'</option>';
                            }
                            
                        }
                    ?>
                </select> :
                <select name="time2" id="">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
                </p>
                        </td>
                    </tr>
            </table>
                
                <h2>Description:</h2>
                <textarea name="details" id="" cols="80%" rows="5%"></textarea>
                <h2>Organizer:</h2>
                <input type="text" name="org" id="" size="100%">
                <h2>Organizer Details:</h2>
                <textarea name="orgdetail" id="" cols="80%" rows="5%"></textarea>
                <h2>Tickets: </h2>
                <p>     
                    Price: <input type="number" name="price" id="">
                </p>
                <h2>Select Event Type</h2>
                <select name="e_type" id="">
                    <?php
                        for ($n=1; $n < 22; $n++) { 
                            echo '<option value="'.$n.'">'.return_type($n).'</option>';
                        }
                    ?>
                </select>
                <h2>Select Event Topic</h2>
                <select name="e_topic" id="">
                    <?php
                        for ($n=1; $n < 23; $n++) { 
                            echo '<option value="'.$n.'">'.return_topic($n).'</option>';
                        }
                    ?>
                </select>
                <br>
                <br><br>
                <button type="submit" value="submit" name="submit" class="button">Next</button><br><br>
        </form>
        </div>
</div> 
        </div>
    </body>
</html>