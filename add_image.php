<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
        <link rel="stylesheet" type="text/css" href="../CSS/newDesign.css">
    </head>
    <body class="bodyAdd_image" id="fontsALL">
        <h1 class="headers">Choose The Event Image</h1>

        <div class="update_Image_align">

        <div class="log_in_forms_for_aadd_image">
        <form method="post" enctype="multipart/form-data">
            <br/>
            <h4>JPEG/JPG</h4>
            <input type="file" name="image" value="select" class="button">
            <br><br>
            <input type="submit" value="Finish & Create Event" name="upload" class="back">
        </form>
        
        <?php
            //Assign
            require('functions.php');
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

                add_to('events','title,location,e_date,e_from,e_to,details,organizer,org_details,price,image,image_name,user_id,e_type,e_topic',"'".$title."','".$place."','".$date."','".$from."','".$to."','".$details."','".$org."','".$orgdetail."','".$price."','none','none','".$user_id."','".$e_type."','".$e_topic."'");
            }


            //Upload Image//
            if(isset($_POST['upload'])){
                echo'uploading Image<br><br>';
                $name="none";
                    if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
                        echo '<html><body>
                            <h1>Failed To Upload Image</h1>
                            <meta http-equiv="refresh" content="0; URL=add_image.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
                    }else{
                        echo '<h3>Upload Successfull..Redirecting</h3>';
                        $image = addslashes($_FILES['image']['tmp_name']);
                        $name = addslashes($_FILES['image']['name']);
                        $image = file_get_contents($image);
                        $image = base64_encode($image);
                        $cline = return_values('*','events','',2);
                        $index = -1;
                        for ($n=0; $n < sizeof($cline); $n++) { 
                            $index=$cline[$n][0];
                        }
                        update_values('events',"image='".$image."',image_name='".$name."'","id='".$index."'");
                        //Redirect//
                        echo '<html><body>
                            <meta http-equiv="refresh" content="2; URL=../index.php?n='.$_GET['n'].'&i='.$_GET['i'].'">
                            <meta name="keywords" content="automatic redirection">
                        </body></html>';
                    }
            }
        ?>
        </div>
        </div>
    </body>
</html>