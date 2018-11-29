<?php
header('Content-Type: application/json');
include "../lib/data.php";
$res=null;
/**
 * 
 */
 class RequestFriend{
      function RequestFriend($to_userid,$from_userid,$send_date,$note,$from_username){
            
            $this->to_userid=$to_userid;
            $this->from_userid=$from_userid;
            $this->send_date=$send_date;
            $this->note=$note;
            $this->full_name=$from_full_name;
      }
 }

  $userid=$_POST["userid"];
  $dbconn = pg_connect("host=ec2-54-227-241-179.compute-1.amazonaws.com
   port=5432 dbname=d4ieg9ce7qihnf user=doirzncaoefasd password=0955cadb61b87148265f253f9b11a740c24b806bbb7d9b24c2b992da74861a99");
  $sql = "SELECT * FROM \"public\".\"request_friends\" WHERE to_userid='$userid'";
//$data = $dbconnection->select($sql);
$data=pg_query($dbconn,$sql);

   // create array user
     $array=array();
   //add element to arrUser
     while ($row=pg_fetch_array($data)) 
     {

          $from_userid= $row['from_userid'];
           echo $from_userid;         
                   /*  $sql_get_fullname = "SELECT * FROM \"public\".\"user\" WHERE userid='$from_userid'";
                     $res2= pg_query($sql_get_fullname);

                     $full_name=null;
                     while($subj=pg_fetch_array($res2))
                     {
                      $full_name= $subj['full_name'];
                         
                     }*/
         array_push($array,  
                         new RequestFriend(
                          $row['to_userid'],
                          $row['from_userid'],
                          $row['send_date'],
                          $row['note']),
                          "aaaaa");
     }      
    // Chuyen dinh dang cua mang thanh JSON
     echo json_encode($array);


?>
