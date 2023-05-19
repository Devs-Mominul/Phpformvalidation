<?php 
session_start();
$name=$_POST["name"];

$email=$_POST["email"];
$password=$_POST["password"];
$confirmpassword=$_POST["confirmpassword"];
$flag=false;

if($name){
    if(ctype_alpha($name)){
        echo "Your name is: ".$name;
    $_SESSION["old_name"]=$name;

    }else{
        $flag=true;
        $_SESSION["n1_error"]="your name is invalid";

    }
    
}else{
    $flag=true;
    $_SESSION["n1_error"]="your name is missing";
}
if($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "Your email is:".$email;
        $_SESSION["old_email"]=$email;
    }else{
        $flag=true;
    $_SESSION["email_error"]="your email is invalid";

    }
   
}else{
    $flag=true;
    $_SESSION["email_error"]="your email is required";

}
if($password){
    if(strlen($password) < 8){
        $flag=true;
    $_SESSION["password_error"]="password is  less than 8 charecters";

    }else{
        echo "Your password is:".$password;
    }
   

}
else{
    $flag=true;
    $_SESSION["password_error"]="password is required";
}
if($confirmpassword){
    echo "your confirm password".$confirmpassword;
}
else{
    $flag=true;
    $_SESSION["confirm_error"]="password is required";
}
if($password != $confirmpassword){
    $flag=true;
    $_SESSION["confirm_error"]="password and confirm password  does not match";

}else{
    if( preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{1,5}$/',$password)!=1
    ){
        $flag=true;
        $_SESSION["password_error"]="your password must be a A * &";

    }
}
if($flag){
    header("location:login.php");

}

else{
    echo "all good";
}



?>