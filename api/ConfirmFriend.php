<?php
header('Content-Type: application/json');
include "../lib/data.php";
//Lấy data từ client
$res = null;
if(isset($_POST['user_id'])&&isset($_POST['friend_id'])){
  $user_id = $_POST['user_id'];
  $friend_id = $_POST['friend_id'];

  //Kết nối database
  include ('../lib/db.php');


  $dbconnection = new postgresql("");

  $sql_send_request = "INSERT INTO public.friend(user_id,friend_id,note)
        VALUES ('$user_id','$friend_id','note')";
  $dbconnection->execute($sql_send_request);
  ///delete
  $sql_delete="DELETE FROM public.request_friends WHERE to_userid='$user_id' AND $from_userid='$friend_id' ";
  $dbconnection->execute($sql_delete);
  //result
  $res = new Result(0,'Send request successfully');
      
  $dbconnection->close();
}

  echo (json_encode($res));
?>
