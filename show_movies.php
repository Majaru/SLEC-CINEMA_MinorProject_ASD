<?php
    //Connect To Database//
    $connect_to_db = null;
    $logged_in=null;  

    function connect_to_database($host_name,$user_name,$pass,$db_name,$close_db){
        $connect_to_db = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($close_db==true){
            
            if(mysql_errno()){
                die("Could not connnect to database. <br/>");
            }else{
                //echo "Connected to " . $db_name . " Successfully." . "<br/>";
                return $connect_to_db;
            }
        }else{
            echo "Database Closed <br/>";
            mysqli_close($connect_to_db);
        }
    }
    function show_movies($where){
        $connect_to_db = connect_to_database('localhost','cinema_admin','admin','cinema_db',true);
        $query="select * from movie_management ".$where;
        $result = mysqli_query($connect_to_db,$query);
        //Checks if there was no result
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                // Output each row//
                                  
                $cLine[] = array($row['movie_name'],$row['movie_price'],$row['movie_details'],$row['movie_image'],$row['release_date'],$row['open_close'],$row['full_vacant'],$row['cinema_number'],$row['id']);
            }
            //4. Release Data From Result
            mysqli_free_result($result);
            //5. Close Connection
            mysqli_close($connect_to_db);
            
            return $cLine;
        }
    }
    function show_list($cLine,$access){
        for($n=0;$n<sizeof($cLine);$n++){
            
            $title = $cLine[$n][0];
            $price = $cLine[$n][1];
            $details = $cLine[$n][2];
            $image = $cLine[$n][3];
            $release_date = $cLine[$n][4];
            $open_close = $cLine[$n][5];
            $full_vacant = $cLine[$n][6];
            $cinema_number = $cLine[$n][7];
            $id = $cLine[$n][8];
            $oddeven ="";
            if($n%2==0){
                $oddeven='even';
            }else{
                $oddeven='odd';
            }
            echo '<hr><p id="" class="'.$oddeven.'">';
            if($access=='admin'){
                echo '<a href="movie_management.php?operation=delete&title='.$id.'" id="buttons">Delete Movie</a>';
                echo '<a href="movie_management.php?operation=update&title='.$id.'" id="buttons">Update Movie</a>';
            }
            
            echo '<img id="movie_image" width="180" src="data:image;base64,'.$image.'" align="left" >';

            echo '<h3 id="movie_title" class="'.$oddeven.'"><br>'.$title.'</h3>';
            echo '<h4 id="movie_price" class="'.$oddeven.'"><br>Php '.$price.'</h4>';
            echo '<h4 id="movie_price" class="'.$oddeven.'">'.$cinema_number.'</h4>';
            echo '<h4 id="movie_price" class="'.$oddeven.'">Release Date: '.$release_date.'</h4>';
            echo '<h4 id="movie_price" class="'.$oddeven.'">Reservations: '.$open_close.'</h4>';
            echo '<h4 id="movie_price" class="'.$oddeven.'">Seats: '.$full_vacant.'</h4>';
            echo '<h3 id="movie_price" class="'.$oddeven.'"><br>Movie Details:<br><br>';
            echo $details;
            echo '<br><br></h3></p>';
        }
    }
    //Sign-up Functions

    //Log-in Functions
    function log_in($userName,$password){
        $connect_to_db = connect_to_database('localhost','cinema_admin','admin','cinema_db',true);
        $query="select * from users where user_name='".$userName."'";
        $result = mysqli_query($connect_to_db,$query);

        if(!$result){
            die("User Does not Exist");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                // Output each row//
                                  
                $cLine[] = array($row['user_name'],$row['password'],$row['name'],$row['access']);
            }
            //4. Release Data From Result
            mysqli_free_result($result);
            //5. Close Connection
            mysqli_close($connect_to_db);
           if(sizeof($cLine)>0){
                if($userName==$cLine[0][0] && $password==$cLine[0][1]){
                    return $cLine;
                }else{
                    echo 'Invalid User Name or Password';
                }
           }else{
               echo "User Does not Exist";
           }
        }

    }
    //CRUD Operation//

    //add
    function add_to($values){
        $connect_to_db = connect_to_database('localhost','cinema_admin','admin','cinema_db',true);
        $query='insert into movie_management ';
        $query.='(movie_name,movie_price,movie_details,movie_image,image_name,release_date,open_close,full_vacant,cinema_number) ';
        $query.='values ';
        $query.='('.$values.')';
        mysqli_query($connect_to_db,$query);

        //4. Release Data From Result
       // mysqli_free_result($result);
        //5. Close Connection
        mysqli_close($connect_to_db);
    }
    
    //return
    function return_values($select,$from,$where,$table_number){
        $connect_to_db = connect_to_database('localhost','cinema_admin','admin','cinema_db',true);
        $query="select ".$select." from ".$from." ".$where;
        $result = mysqli_query($connect_to_db,$query);
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                // Output each row//
                switch($table_number){
                    //Cinema Table
                    case 1:{
                        $cLine[] = array($row['cinema_name'],$row['cinema_seats']);
                        break;
                    }
                    //Movie_management table
                    case 2:{
                        $cLine[] = array($row['movie_name'],$row['movie_price'],$row['movie_details'],$row['movie_image'],$row['release_date'],$row['open_close'],$row['full_vacant'],$row['cinema_number'],$row['id'],$row['image_name']); 
                        break;
                    }
                }
            }
            //4. Release Data From Result
            mysqli_free_result($result);
            //5. Close Connection
            mysqli_close($connect_to_db);
            
            return $cLine;
        }

    }
    //Delete
    function delete_values($where){
        $connect_to_db = connect_to_database('localhost','cinema_admin','admin','cinema_db',true);
        $query='delete from movie_management where '.$where;
        mysqli_query($connect_to_db,$query);
        mysqli_close($connect_to_db);
        header("Location: movie_management?access=admin");
    }
    function update_values($set,$where){
        $connect_to_db = connect_to_database('localhost','cinema_admin','admin','cinema_db',true);
        $query="update movie_management set ".$set." where id='".$where."'";
        mysqli_query($connect_to_db,$query);
        mysqli_close($connect_to_db);
    }

    //Start Here//connect_to_database('localhost','cinema_admin','admin','cinema_db',true);
    
?>