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
if(isset($_POST["userid"])){

    $userid = $_POST["userid"];
    $sql = "SELECT * FROM public.request_friends WHERE to_userid='74'";
     // ket noi database
     include "../lib/db.php";
     //$dbconnection=getDatabase();
     $dbconnection = new postgresql("");
     $result = $dbconnection->select($sql);
   
    if(postgresql_num_rows($result)>0){
            $array=array();
         echo "s";
          //add element to arrUser
            while ($row=mysqli_fetch_assoc($result)) 
                 {
                    
                     array_push($array, 
                                new RequestFriend(
                                            $row['to_userid'],
                                            $row['from_userid'],
                                            $row['send_date'],
                                            $row['note'])
                              );
                 }
                      
    // Chuyen dinh dang cua mang thanh JSON
           echo json_encode($array);

        }
      else{
        echo "kjkkk";
        //error -1
          $res = new Result(Constant::GENERAL_ERROR,'Send request not excute');
          echo (json_encode($res));
      }  
    $dbconnection->close();

}

else{
  //error -1
        $res = new Result(Constant::GENERAL_ERROR,'Send request not excute');
        echo (json_encode($res));
}


?>
