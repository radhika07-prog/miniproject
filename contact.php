<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "mytutor";
//$errors = array(); 


$con = mysqli_connect($server, $username, $password, $dbname );

if(!$con){
    echo "not connected";
}
else{
  // echo "connected";
}
if(isset($_POST['name']) || isset($_POST['email']) || isset( $_POST['text'])){
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
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contactstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body style="background-image: url(https://source.unsplash.com/650x550)">
    <div class="container">
        <header>
            <h1>Contact Us</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam totam iure vitae nesciunt quaerat sed, et ullam placeat ut? Impedit dolorem nostrum itaque molestias nemo delectus animi fuga illum magnam earum pariatur reiciendis, explicabo id velit facilis, necessitatibus cum! Magnam.</p>
        </header>
        <div class="content">
            <div class="content-form">
                <section>
                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                    <h2>address</h2>
                    <p>
                        Lorem ipsum dolor sit. <br>
                        Lorem, ipsum dolor. <br>
                        lorem
                    </p>
                </section>

                <section>
                    <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                    <h2>Phone</h2>
                    <p>123-456-78901548</p>
                </section>

                <section>
                    <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                    <h2>E-mail</h2>
                    <p>dghdgqd@temporary.net</p>
                </section>
            </div>
        </div>

      <form action=" #" method="POST">
        <div class="form">
            <div class="right">
              <div class="contact-form">
                  <input type="text" name="name" required>
                  <span>Full Name</span>
              </div>
  
              <div class="contact-form">
                  <input type="E-mail"  name = "email" required>
                  <span>E-mail Id</span>
              </div>
              <div class="contact-form">
                  <textarea name="text">
                    
                  </textarea>
                  <span> Type your Message....</span>
              </div>
  
              <div class="contact-form">
                  <input type="submit" name="submit">
              </div>
              </div>
            </div>
          </div>
    </form>
        <div class="media">
            <li><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></li>
        </div>
        <div class="empty">

        </div>
    </div>    
</body>
</html>