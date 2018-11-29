<?php
header('Content-Type: application/json');
include "../lib/data.php";
$res=null;
/**
 * 
 */
 class RequestFriend{
      function RequestFriend($to_userid,$from_userid,$send_date,$note){
            $this->to_userid=$to_userid;
            $this->from_userid=$from_userid;
            $this->send_date=$send_date;
            $this->note=$note;
          
      }
 }



$dbconn = pg_connect("host=ec2-54-227-241-179.compute-1.amazonaws.com
  port=5432 dbname=d4ieg9ce7qihnf user=doirzncaoefasd password=0955cadb61b87148265f253f9b11a740c24b806bbb7d9b24c2b992da74861a99");
  $sql = "SELECT * FROM \"public\".\"user\" ";
//$data = $dbconnection->select($sql);
$data=pg_query($dbconn,$sql);
class User{
      function User($user_id,$user_name,$full_name){
            $this->User_ID=$user_id;
            $this->User_Name=$user_name;
            $this->Full_Name=$full_name;
      }
 }
   // create array user
     $arrUser=array();
   //add element to arrUser
     while ($row=pg_fetch_array($data)) 
     {
        array_push($arrUser, new User($row['user_id'],$row['user_name'],$row['full_name']));
     }      
    // Chuyen dinh dang cua mang thanh JSON
     echo json_encode($arrUser);




?>
