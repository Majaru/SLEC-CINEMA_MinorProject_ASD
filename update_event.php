<html>
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
    <link rel="stylesheet" type="text/css" href="../CSS/newDesign.css">
</head>
<body style="padding-right: 50px" class="bodyUpdate_Events" id="fontsALL">

    <h1 class="headers">Update Event</h1>
    <?php
    
        echo '<form action="my_events.php?n='.$_GET['n'].'&i='.$_GET['i'].'" method="post">
            <button class="back" type="submit">Back</button>
        </form>
        <form action="update_image.php?n='.$_GET['n'].'&i='.$_GET['i'].'&e='.$_GET['e'].'" method="post">';
    ?>
        <?php
            //Retrieve Data
            require('functions.php');
            $cline = return_values('*','events',"where id='".$_GET['e']."'",2);
        ?>
        <div class="others3">
        <h2>Event Title:</h2>
            <?php
                echo '<input type="text" name="title" id="" maxlength="500" size="100%" value="'.$cline[0][1].'">';
            ?>
        <h2>Location:</h2>
            <?php
                echo '<input type="text" name="place" id="" value="'.$cline[0][2].'" size="100%">';
            ?>
        <!--Start-->
        <br><br>
        <table>
                <tr>
                    <td>
                        
                        <p><h2 class="e_info">Start</h2>
                        
                    Date: 
                        <select name="month1" id="">
                            <?php
                                //Translating the date
                                $temp=explode('@',$cline[0][3]);
                                $date1=explode('/',$temp[0]);
                                $date2=explode('/',$temp[1]);
                                //Translating Time//
                                $time1=explode(':',$cline[0][4]);
                                $time2=explode(':',$cline[0][5]);
                                for($n=1;$n<13;$n++){
                                    if($n==$date1[0]){
                                        echo '<option selected="selected" value="'.$n.'">'.return_month($n).'</option>';
                                    }else{
                                        echo '<option value="'.$n.'">'.return_month($n).'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <select name="day1" id="">
                            <?php
                                for($n=1;$n<32;$n++){
                                    if($n==$date1[1]){
                                        echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                                    }else{
                                        echo '<option value="'.$n.'">'.$n.'</option>';
                                    }
                                    
                                }
                            ?>
                        </select>
                        <select name="year1" id="">
                            <?php
                                for($n=2000;$n<2050;$n++){
                                    if($n==$date1[2]){
                                        echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                                    }else{
                                        echo '<option value="'.$n.'">'.$n.'</option>';
                                    }
                                    
                                }
                            ?>
                        </select><br>Time 
                        <select name="hh1" id="">
                            <?php
                                for($n=1;$n<13;$n++){
                                    if($n<10){
                                        if($n==$time1[0]){
                                            echo '<option selected="selected" value="0'.$n.'">0'.$n.'</option>';
                                        }else{
                                            echo '<option value="0'.$n.'">0'.$n.'</option>';
                                        }
                                    }else{
                                        if($n==$time1[0]){
                                            echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                                        }else{
                                            echo '<option value="'.$n.'">'.$n.'</option>';
                                        }
                                    }
                                }
                            ?>
                    </select> :
                    <select name="mm1" id="">
                        <?php
                            for($n=0;$n<60;$n++){
                                if($n<10){
                                    if($n==$time1[1]){
                                        echo '<option selected="selected" value="0'.$n.'">0'.$n.'</option>';
                                    }else{
                                        echo '<option value="0'.$n.'">0'.$n.'</option>';
                                    }                                    
                                }else{
                                    if($n==$time1[1]){
                                        echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                                    }else{
                                        echo '<option value="'.$n.'">'.$n.'</option>';
                                    }                                    
                                }
                                
                            }
                        ?>
                    </select> :
                    <select name="time1" id="">
                        <?php
                            if($time1[2]=="AM"){
                                echo '<option selected="selected" value="AM">AM</option>
                                <option value="PM">PM</option>';
                            }else{
                                echo '<option value="AM">AM</option>
                                <option selected="selected" value="PM">PM</option>';
                            }
                        ?>
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
                                if($n==$date2[0]){
                                    echo '<option selected="selected" value="'.$n.'">'.return_month($n).'</option>';
                                }else{
                                    echo '<option value="'.$n.'">'.return_month($n).'</option>';
                                }
                            }
                        ?>
                    </select>
                    <select name="day2" id="">
                        <?php
                            for($n=1;$n<32;$n++){
                                if($n==$date2[1]){
                                    echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                                }else{
                                    echo '<option value="'.$n.'">'.$n.'</option>';
                                }
                                
                            }
                        ?>
                    </select>
                    <select name="year2" id="">
                        <?php
                            for($n=2000;$n<2050;$n++){
                                if($n==$date2[2]){
                                    echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                                }else{
                                    echo '<option value="'.$n.'">'.$n.'</option>';
                                }
                                
                            }
                        ?>
                    </select><br> Time 
                <select name="hh2" id="">
                    <?php
                        for($n=1;$n<13;$n++){
                            if($n<10){
                                if($n==$time2[0]){
                                    echo '<option selected="selected" value="0'.$n.'">0'.$n.'</option>';
                                }else{
                                    echo '<option value="0'.$n.'">0'.$n.'</option>';
                                }
                            }else{
                                if($n==$time2[0]){
                                    echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                                }else{
                                    echo '<option value="'.$n.'">'.$n.'</option>';
                                }
                            }
                        }
                    ?>
            </select> :
            <select name="mm2" id="">
                <?php
                    for($n=0;$n<60;$n++){
                        if($n<10){
                            if($n==$time2[1]){
                                echo '<option selected="selected" value="0'.$n.'">0'.$n.'</option>';
                            }else{
                                echo '<option value="0'.$n.'">0'.$n.'</option>';
                            }                                    
                        }else{
                            if($n==$time2[1]){
                                echo '<option selected="selected" value="'.$n.'">'.$n.'</option>';
                            }else{
                                echo 'value="'.$n.'">'.$n.'</option>';
                            }                                    
                        }
                        
                    }
                ?>
            </select> :
            <select name="time2" id="">
                <?php
                    if($time2[2]=="AM"){
                        echo '<option selected="selected" value="AM">AM</option>
                        <option value="PM">PM</option>';
                    }else{
                        echo '<option value="AM">AM</option>
                        <option selected="selected" value="PM">PM</option>';
                    }
                ?>
            </select>
            </p>
                    </td>
                </tr>
        </table>
            
            <h2>Description:</h2>
                <?php
                    echo '<textarea name="details" id="" cols="80%" rows="5%">'.$cline[0][6].'</textarea>';
                ?>
            <h2>Organizer:</h2>
                <?php
                    echo '<input type="text" name="org" id="" size="100%" value="'.$cline[0][7].'">';
                ?>
            <h2>Organizer Details:</h2>
                <?php
                    echo '<textarea name="orgdetail" id="" cols="80%" rows="5%">'.$cline[0][8].'</textarea>';
                ?>
            <h2>Tickets: </h2>
            <p>     
                <?php
                    echo 'Price: <input type="number" name="price" id="" value="'.$cline[0][9].'">';
                ?>
            </p>
                <?php
                    echo '<h2>Select Event Type :</h2>'
                ?>
            <select name="e_type" id="">
                <?php
                    for ($n=1; $n < 22; $n++) {
                        if($n==$cline[0][13]){
                            echo '<option selected="selected" value="'.$n.'">'.return_type($n).'</option>';
                        }else{
                            echo '<option value="'.$n.'">'.return_type($n).'</option>';
                        }                        
                    }
                ?>
            </select>
            <?php
                    echo '<h2>Select Event Topic :</h2>'
            ?>
            <select name="e_topic" id="">
                <?php
                    for ($n=1; $n < 23; $n++) {
                        if($n==$cline[0][14]){
                            echo '<option selected="selected" value="'.$n.'">'.return_topic($n).'</option>';
                        }else{
                            echo '<option value="'.$n.'">'.return_topic($n).'</option>';
                        }                        
                    }
                ?>
            </select>
            <br>
            <br><br>
            <button class="back" type="submit" value="submit" name="submit">Next</button><br><br>
    </form>
    </div>
</body>
</html>