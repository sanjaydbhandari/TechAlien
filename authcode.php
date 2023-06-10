<?php
session_start();
include('config.php'); 
include('redirect.php');

if (isset($_POST['register'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone_number = mysqli_real_escape_string($conn, $_POST['phonenumber']);
  $full_name = strtolower(mysqli_real_escape_string($conn, $_POST['fullname']));
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
  $token = bin2hex(random_bytes(15));

  if (empty(trim($full_name))) {
    $_SESSION['msg'] = "Please Enter your Fullname";
    header('location:signup.php');
  }else if (empty(trim($full_name)) ){
      $_SESSION['msg'] = "Name must contain letters and spaces only!";
      header('location:admins.php');
  } else if (!preg_match('/^[\p{L} ]+$/u', $full_name)) {
    $_SESSION['msg'] = "Name must contain letters and spaces only!";
    header('location:signup.php');
  } else if (empty(trim($email))) {
    $_SESSION['msg'] = "Please Enter your Email";
    header('location:signup.php');
  } else if (empty(trim($phone_number))) {
    $_SESSION['msg'] = "Please Enter your Mobile Number";
    header('location:signup.php');
  } else if (!preg_match('/^[6-9][0-9]{9}$/', $phone_number)) {
    $_SESSION['msg'] = "Mobile Number is not Valid";
    header('location:signup.php');
  } else if (empty(trim($password))) {
    $_SESSION['msg'] = "Please Enter your Password";
    header('location:signup.php');
  } else if (strlen($_POST["password"]) <= '8' || !preg_match("#[A-Z]+#",$_POST["password"]) ||!preg_match("#[a-z]+#",$_POST["password"]) || !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
    $_SESSION['msg'] = "Your Password Must have AtLeast 8 Digits which contain 1 Number, 1 Capital Letter, 1 Lowercase Letter and 1 Special Character!";
    header('location:signup.php');
  } else if (empty(trim($cpassword))) {
    $_SESSION['msg'] = "Confirm Password is required";
    header('location:signup.php');
  } else {
    $select = " SELECT * FROM users WHERE (email = '$email')";
    $query = mysqli_query($conn, $select);
    if (mysqli_num_rows($query) > 0) {
      $_SESSION['msg'] = 'Email Id already register';
      header('location:signup.php');
    } else {
      if ($password != $cpassword) {
        $_SESSION['msg'] = 'Password do not matched!';
        header('location:signup.php');
      } else {
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $insert = "INSERT INTO users(id,fullname,email,phone,password,token) VALUES('','$full_name','$email','$phone_number','$pass','$token')";
        if (mysqli_query($conn, $insert)) {
          $_SESSION['msg'] = "Registered Successfully!";
          header('location:login.php');
        } else {
          $_SESSION['msg'] = "Something went wrong";
          header('location:signup.php');
        }
      }
    }
  }
}
else if(isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  $email_search = "select * from users where email = '$email' ";
  $query = mysqli_query($conn, $email_search);

  if (mysqli_num_rows($query) > 0) { 
    $row = mysqli_fetch_array($query);
    $userid=$row['id'];
    $fullname=$row['fullname'];
    $email=$row['email'];
    $role=$row['role'];

    if (empty(trim($pass))) {
      redirect('login.php','Please Enter your Password');
    }else if (strlen($pass) < '8' || !preg_match("#[A-Z]+#",$pass) || !preg_match("#[a-z]+#",$pass ) || !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass ) ){
        $_SESSION['msg'] = "Your Password Must have AtLeast 8 Digits which contain 1 Number, 1 Capital Letter, 1 Lowercase Letter and 1 Special Character!";
        header('location:login.php');
    }else if (password_verify($pass, $row['password'])) {
      
      $_SESSION['auth'] = true;//sessions
      $_SESSION['auth_user'] = [
        'user_id'=> $userid,
        'fullname'=> $fullname,
        'email'=> $email
      ];
      $_SESSION['role']=$role;

      if ($role == 1) {
        redirect('admin/index.php','Welcome To Dashboard');
      }
      else
      {
        redirect('index.php','logged In Successfully');
      }
    } else {
      redirect('login.php','your enter incorrect password');
    }
  } else {
    redirect('login.php','Email Id is not register');
  }
}
?>

