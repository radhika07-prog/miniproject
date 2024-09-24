<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "mytutor";
$errors = array(); 


$con = mysqli_connect($server, $username, $password, $dbname );

if(!$con){
    echo "not connected";
}
else{
  // echo "connected";
}

$username = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['text'];
$user_check_query = "SELECT * FROM contact1 WHERE name='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($con, $user_check_query);
$user = mysqli_fetch_assoc($result);
// if user exists
if ($user) { 
  if ($user['name'] === $username) {
    echo "<script>
    window.location.href ='contact.php';
    alert('user name already exist !!!')
    </script>";
  }

  if ($user['email'] === $email) {
    echo "<script>
    window.location.href ='contact.php';
    alert('email already exist !!!')
    </script>";
  }
}

$sql = "INSERT INTO `contact1`(`name`, `email`, `message`) VALUES ('$username','$email','$message')";

$result = mysqli_query($con, $sql);

if($result){
    echo "data submited";
}
else{
    echo "query faild";
}
?>