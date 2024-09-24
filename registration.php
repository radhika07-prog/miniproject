<?php 

$server = "localhost";
$name = "root";
$message = "";
$dbname = "contactus";
$errors = array(); 


$con = mysqli_connect($server, $name, $message, $dbname );

if(!$con){
    echo "not connected";
}
else{
  // echo "connected";
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$user_check_query = "SELECT * FROM contact WHERE name='$name' OR email='$email' LIMIT 1";
$result = mysqli_query($con, $user_check_query);
$user = mysqli_fetch_assoc($result);
// if user exists
if ($user) { 
  if ($user['name'] === $name) {
    echo "<script>
    window.location.href ='.html';
    alert('user name already exist !!!')
    </script>";
  }

  if ($user['email'] === $email) {
    echo "<script>
    window.location.href ='registrationform.html';
    alert('email already exist !!!')
    </script>";
  }
}

$sql = "INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";

$result = mysqli_query($con, $sql);

if($result){
    echo "data submited";
}
else{
    echo "query faild";
}
?>
