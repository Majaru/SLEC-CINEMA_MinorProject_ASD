<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
        <link rel="stylesheet" type="text/css" href="../CSS/newDesign.css">
    </head>
    <body style="padding-right: 50px" class="bodyUpdate_Image" id="fontsALL">
        <h1 class="headers">Choose The Event Image</h1>

        <div class="update_Image_align">

            <?php
                require('functions.php');
                $cline=return_values('*','events',"where id='".$_GET['e']."'",2);
                echo '<p>
                        <img  /* width="500px" height = "300%"*/ src="data:image;base64,'.$cline[0][10].'" alt="No Event Image.">
                    </p>';
            ?>
            <form method="post" enctype="multipart/form-data">
                <br/>
                <h4>JPEG/JPG</h4>
                <input class="back" type="file" name="image" value="select">
                <br><br>
                <input class="back" type="submit" value="Finish & Update Event" name="upload">
            </form>
            
            <?php
                //Assign
                
                if(isset($_POST['submit'])){
                    $title=$_POST['title'];
                    $place=$_POST['place'];
                    $date=$_POST['month1'].'/'.$_POST['day1'].'/'.$_POST['year1'].'@'.$_POST['month2'].'/'.$_POST['day2'].'/'.$_POST['year2'];
                    $from=$_POST['hh1'].':'.$_POST['mm1'].':'.$_POST['time1'];
                    $to=$_POST['hh2'].':'.$_POST['mm2'].':'.$_POST['time2'];
                    $details=$_POST['details'];
                    $org=$_POST['org'];
                    $orgdetail=$_POST['orgdetail'];
                    $price=$_POST['price'];
                    $user_id=$_GET['i'];
                    $e_type=$_POST['e_type'];
                    $e_topic=$_POST['e_topic'];

                    update_values('events',"title='".$title."',location='".$place."',e_date='".$date."',e_from='".$from."',e_to='".$to."',details='".$details."',organizer='".$org."',org_details='".$orgdetail."',price='".$price."',e_type='".$e_type."',e_topic='".$e_topic."'","id='".$_GET['e']."'");
                }


                //Upload Image//
                if(isset($_POST['upload'])){
                    echo'uploading Image<br><br>';
                    $name="none";
                        if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
                            //Redirect//
                            echo '<html><body>
                                <h1>File ALready in use...Redirecting...</h1>
                                <meta http-equiv="refresh" content="2; URL=../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                                <meta name="keywords" content="automatic redirection">
                            </body></html>';
                        }else{
                            echo '<h3>Upload Successfull..Redirecting</h3>';
                            $image = addslashes($_FILES['image']['tmp_name']);
                            $name = addslashes($_FILES['image']['name']);
                            $image = file_get_contents($image);
                            $image = base64_encode($image);
                            $cline = return_values('*','events','',2);
                            update_values('events',"image='".$image."',image_name='".$name."'","id='".$_GET['e']."'");
                            //Redirect//
                            echo '<html><body>
                                <meta http-equiv="refresh" content="2; URL=../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                                <meta name="keywords" content="automatic redirection">
                            </body></html>';
                        }
                }
            ?>
        </div>
    </body>
</html>