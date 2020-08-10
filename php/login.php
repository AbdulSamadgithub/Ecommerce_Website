<?php

$email= $_POST['email']
$password= $_POST['password']

if(!empty(!empty($email)||!empty($password)){
  $host="localhost";
  $dbUsername="root"
  $dbPassword="";
  $dbname="ecommerce";

  //connection
  $con = new mysqli($host,$dbUsername,$dbpassword,$dbname);
  if(mysqli_connect_error()){
    die('connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
  }
  else{
    $SELECT = "SELECT email From signup where email=? Limit 1"
    $INSERT = "INSERT Into signup(firstname,lastname,email,password) values(?,?,?,?)"

    // prapare Statement
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $password, $gender, $email, $phoneCode, $phone);
      $stmt->execute();
      echo "New record inserted sucessfully";}
      else{
        echo "Someone already register using this email";
      }
      $stmt->close();
     $conn->close();
  }
}
else{
  echo "All fields are required";
  die();
}

?>