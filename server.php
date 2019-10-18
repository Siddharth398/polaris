<?php
session_start();

$fname = "";
$lname = "";
$disname = "";
$email = "";
$errors = array();


$db = mysqli_connect('192.168.1.101:3306', 'root', '', 'Polaris');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $disname = mysqli_real_escape_string($db, $_POST['disname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($fname)) { array_push($errors, "First Name is required."); }
  if (empty($lname)) { array_push($errors, "Last Name is required."); }
  if (empty($disname)) { array_push($errors, "Display Name is required."); }
  if (empty($email)) { array_push($errors, "Email is required."); }
  if (empty($password_1)) { array_push($errors, "Password is required."); }
  if ($password_1 != $password_2) {
	array_push($errors, "Passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE DisplayName='$disname' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['DisplayName'] === $disname) {
      array_push($errors, "Display Name already exists.");
    }

    if ($user['Email'] === $email) {
      array_push($errors, "Email already exists.");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (Fname, Lname, DisplayName, Email, Password) 
  			  VALUES('$fname', '$lname', '$disname', '$email', '$password')";
  	mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['disname'] = $disname;
    $_SESSION['success'] = "You are now logged in!";
    $query = "SELECT * FROM users WHERE Email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
    $_SESSION['user_id'] = $row['ID'];
  	header('location: index.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required.");
    }
    if (empty($password)) {
        array_push($errors, "Password is required.");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE Email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in!";
          $row = mysqli_fetch_array($results);
          $_SESSION['user_id'] = $row['ID'];
          $_SESSION['disname'] = $row['DisplayName'];
          header('location: index.php');
        }else {
            array_push($errors, "Sorry, the credentials you are using are invalid.");
        }
    }
  }
  
  mysqli_close($db)

  ?>
