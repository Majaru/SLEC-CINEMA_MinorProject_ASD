<?php
    //Connect to Database//
    $conn=null;

    function connect_to_database($host_name,$user_name,$pass,$db_name,$open_db){
        $conn = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($open_db==true){
            
            if(mysqli_errno($conn)){
                die("Could not connnect to database. <br/>");
            }else{
                return $conn;
            }
        }else{
            echo "Database Closed <br/>";
            mysqli_close($conn);
        }
    }
    //Crud Operation
    // C = add
    function add_to($table,$columns,$values){
        
        $conn=connect_to_database('localhost','cinema_admin','admin','event_db',true);
        $query='insert into '.$table.' ';
        $query.='('.$columns.') ';
        $query.='values ';
        $query.='('.$values.')';
        $result=mysqli_query($conn,$query);
        if(!$result){
            return FALSE;
        }
        //4. Release Data From Result
        //mysqli_free_result($result);
        //5. Close Connection
        mysqli_close($conn);
        return TRUE;
    }
    //R = Return a query
    function return_values($select,$from,$where,$table_number){
        $conn = connect_to_database('localhost','cinema_admin','admin','event_db',true);
        $query="select ".$select." from ".$from." ".$where;
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                switch($table_number){
                    // Users Table
                    case 1:{
                        $cLine[] = array($row['id'],$row['email'],$row['password'],$row['fname'],$row['lname'],);
                        break;
                    }
                    // Events Table
                    case 2:{
                        $cLine[] = array($row['id'],$row['title'],$row['location'],$row['e_date'],$row['e_from'],$row['e_to'],$row['details'],$row['organizer'],$row['org_details'],$row['price'],$row['image'],$row['image_name'],$row['user_id'],$row['e_type'],$row['e_topic']);
                        break;
                    // Purchases Table
                    }case 3:{
                        $cLine[] = array($row['id'],$row['admin_id'],$row['participant_id'],$row['name'],$row['event_id'],$row['event_title'],$row['event_start'],$row['payment']);
                        break;
                    }
                }
            }
            //4. Release Data From Result
            mysqli_free_result($result);
            //5. Close Connection
            mysqli_close($conn);
            
            return $cLine;
        }

    }
    //Update
    function update_values($table,$set,$where){
        $query='update '.$table.' set '.$set.' where '.$where;
        $conn = connect_to_database('localhost','cinema_admin','admin','event_db',true);
        $result = mysqli_query($conn,$query);

        mysqli_close($conn);
        return TRUE;
    }
    //Delete
    function delete_values($from,$where){
        $conn = connect_to_database('localhost','cinema_admin','admin','event_db',true);
        $query='delete from '.$from.' where '.$where;
        mysqli_query($conn,$query);
        mysqli_close($conn);
        return true;
    }
    //Translate Values
    function return_month($value){
        switch ($value) {
            case 1:
                return 'January';
            case 2:
                return 'February';
            case 3:
                return 'March';
            case 4:
                return 'April';
            case 5:
                return 'May';
            case 6:
                return 'June';
            case 7:
                return 'July';
            case 8:
                return 'August';
            case 9:
                return 'September';
            case 10:
                return 'October';
            case 11:
                return 'November';
            case 12:
                return 'December';
        }
    }
   
?>