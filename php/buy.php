<?php

$yourname= $_POST['yourname']
$fathername= $_POST['fathername']
$productid= $_POST['productid']
$email= $_POST['email']
$phone= $_POST['phone']
$cnic= $_POST['cnic']

if(!empty($yourname)||!empty($fathername)||!empty($productid)||!empty($email)||!empty($phone)||!empty($cnic)){
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
    $SELECT = "SELECT productid From login where productid=? Limit 1"
    $INSERT = "INSERT Into login(yourname,fathername,productid,email,phone,cnic) values(?,?,?,?,?,?)"

    // prapare Statement
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $productid);
     $stmt->execute();
     $stmt->bind_result($productid);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $email, $gender, $productid, $phoneCode, $phone);
      $stmt->execute();
      echo "New record inserted sucessfully";}
      else{
        echo "Someone already register using this productid";
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