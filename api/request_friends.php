<?php
header('Content-Type: application/json');
include "../lib/data.php";
//Lấy data từ client
$res = null;
if(isset($_POST['to_userid'])&&isset($_POST['from_userid'])){
  $to_userid = $_POST['to_userid'];
  $from_userid = $_POST['to_userid'];

  //Kết nối database
  include ('../lib/db.php');


  $dbconnection = new postgresql("");
  echo "ABC";
  $sql_send_request = "INSERT INTO public.request_friends(to_userid,from_userid,send_date,note)
        VALUES ('$to_userid','$from_userid',CURRENT_DATE,'hello')";
  $dbconnection->execute($sql_send_request);

  $res = new Result(Constant::SUCCESS,'Send request successfully');
      
  $dbconnection->close();

  echo (json_encode($res));
?>
