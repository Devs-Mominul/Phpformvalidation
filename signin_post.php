<?php 
$email=$_POST["email"];
$password=$_POST["password"];
$db_connect=mysqli_connect("localhost","root","","shohan");
$dur="SELECT  COUNT(*) AS  'RESULT' FROM `sir` WHERE  Email='$email' AND password='$password' ";
$from_db=mysqli_query($db_connect,$dur);
$assoc_array=mysqli_fetch_assoc($from_db)['RESULT'];
if($assoc_array==1){
    echo "very good. go ahead";
}else{
    echo "your password and email are wrong";
}
?>