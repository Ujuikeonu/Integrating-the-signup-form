<?php
$fname = $_POST['firstname'];
$sname = $_POST['surname'];
$email = $_POST['email'];
$user_password = $_POST['password'];
// $cpassword = $_POST['cpassword'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$country = $_POST['country'];


if(saveToDatabase($fname, $sname, $email, $user_password, $phone, $gender, $country)){
    header('location: success.html');
}
else{
    header('location: fail.html');
}

function saveToDatabase($fname, $sname, $email, $user_password, $phone, $gender, $country){
    $serverName = "localhost";
    $database = "registration";
    $username = "root";
    $password = "";
    //Open database connection
    $conn = mysqli_connect($serverName, $username, $password, $database);
    
    // Check that connection exists
    if (!$conn) 
    {
       die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO users (firstname, lastname, email,user_password, phone, gender, country, created_date)
    VALUES ('$fname', '$sname', '$email', '$user_password', '$phone', '$gender', '$country', NOW())";
    $result = mysqli_query($conn, $sql);
    //Check for errors
    if (!$result) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
    //Close the connection
    mysqli_close($conn);
    return $result;
}





// saveToFile($name, $email);
// header('Location:success.html');
// function saveToFile($name, $email) {
// $fileHandler = fopen('record.txt', 'a');
// $string = $name . ',' . $email . "\n";
// fwrite($fileHandler, $string);
// fclose($fileHandler); 
//}



