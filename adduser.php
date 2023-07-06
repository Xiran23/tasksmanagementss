<?php include('config/db.php'); ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styledash.css"/>
  <link rel="stylesheet" href="responsive.css">
  <!-- Link Swiper's CSS -->
  <!-- <link rel="stylesheet" href="swiper/swiper-bundle.min.css" /> -->

  <title>Dashbord</title>
</head>

<body>


  <?php
  include('inc/header.php');
  include('inc/nav.php');

  ?>

  <div class="container">

    <div class="Section">

      <!-- ******************************** -->

      <div class="register-form">



        <form method="post" onsubmit="return validation()">


          <div class="form-input">

            <label for="">First name</label>
            <input id="fname" name="fname" type="text">
            <br>
            <span class="errors" id="name"></span>

          </div>
          <div class="form-input">

            <label for="">Last name</label>
            <input id="lastname" name="lastname" type="text">
            <span id="slname"> </span>
          </div>
          <div class="form-input">

            <label for="">username</label>
            <input id="username" name="username" type="text">
            <span id="susername"> </span>
          </div>
          <div class="form-input">

            <label for="">email</label>
            <input id="email" name="email" type="email">
            <span id="semail"> </span>

          </div>
          <div class="form-input">

            <label for="">Register as </label>
            <select name="role" id="">
              <option value="1">admin</option>
              <option value="2">Manager</option>
              <option value="3">Staff</option>
            </select>

          </div>
          <div class="form-input">

            <label for="">password</label>
            <input id="password" name="password" type="text">
            <span id="spassword"> </span>
          </div>

          <div class="form-input">

            <label for="">re-password</label>
            <input id="repassword" name="rpassword" type="text">
            <span id="srepassword"> </span>
          </div>
          <div class="form-input">

            <label for="">phonenumber</label>
            <input id="pnumber" name="pnumber" type="number">
            <span id="sphonenumber"> </span>
          </div>
          <div class="form-input">




            <input type="submit" class="button-small" style="background-color: grey;"name="submit" value="Register">

        </form>

      </div>
      <!-- ******************************** -->
      <!-- ************************************************************************************************************************************************************* -->

    </div>
  </div>

</body>

<script>
  function validation() {
    // event.preventDefault();




    var fname = document.getElementById('fname').value;

    var lastname = document.getElementById('lastname').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var rpassword = document.getElementById('repassword').value;


    var phonenumber = document.getElementById('pnumber').value;





    if (fname == "") {
      document.getElementById('name').innerHTML = "Please fill the username field ";
      return false;

    }

    if (!isNaN(fname)) {
      document.getElementById('name').innerHTML = "only character are allowed ";
      return false;

    }
    if ((fname.length <= 2) || (fname.length > 20)) {
      document.getElementById('name').innerHTML = "user length should be more than 2 and less than 20 ";
      return false;

    }


    if (lastname == "") {
      document.getElementById('slname').innerHTML = "Please fill the lastname field ";
      return false;

    }
    if (username == "") {
      document.getElementById('susername').innerHTML = "Please fill the usertname field ";
      return false;

    }
    if (email == "") {
      document.getElementById('semail').innerHTML = "Please fill the email field ";
      return false;

    }

    if (email.indexOf('@') <= 0) {
      document.getElementById('semail').innerHTML = "Invalid @postion";
      return false;

    }
    if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {

      document.getElementById('semail').innerHTML = "Invalid . positions ";
      return false;
    }



    if (password == "") {
      document.getElementById('spassword').innerHTML = "Please fill the password field ";
      return false;

    }

    if ((password.length <= 5) || (password.length > 20)) {
      document.getElementById('spassword').innerHTML = "user password should be more than 5 and less than 20 ";
      return false;

    }
    if (rpassword == "") {
      document.getElementById('srepassword').innerHTML = "Please fill the repassword field ";
      return false;


    }

    if (password != rpassword) {
      document.getElementById('srepassword').innerHTML = "password dint match ";
      return false;

    }
    if (phonenumber == "") {
      document.getElementById('sphonenumber').innerHTML = "Please fill the phone field ";
      return false;

    }
    if (isNaN(phonenumber)) {
      document.getElementById('sphonenumber').innerHTML = "user must write digits ";
      return false;

    }
    if (phonenumber.length != 10) {
      document.getElementById('sphonenumber').innerHTML = "number must be 10 digits ";
      return false;

    }
  }
</script>

<!-- Swiper JS -->

<!-- <script src="swiper/swiper-bundle.min.js"></script> -->
<!-- <script src="js/jquery-3.7.0.min.js"></script> -->
<!-- <script src="js/index.js"></script> -->
<!-- <script src="ajax/ajax.js"></script> -->

<!-- Initialize Swiper -->

</html>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    $fname = $_POST['fname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role  = $_POST['role'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $phonenumber = $_POST['pnumber'];

    //validate the first name

    // Validate first name
    if (empty($fname)) {

    }

    // Validate last name
    if (empty($lastname)) {
      $errors['lastname'] = 'Please fill in the last name field.';
    }

    // Validate username
    if (empty($username)) {
      $errors['username'] = 'Please fill in the username field.';
    }

    // Validate email
    if (empty($email)) {
      $errors['email'] = 'Please fill in the email field.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Invalid email format.';
    }

    // Validate password
    if (empty($password)) {
      $errors['password'] = 'Please fill in the password field.';
    } elseif (strlen($password) < 6 || strlen($password) > 20) {
      $errors['password'] = 'Password should be between 6 and 20 characters.';
    }

    // Validate retype password
    if (empty($rpassword)) {
      $errors['rpassword'] = 'Please fill in the retype password field.';
    } elseif ($password !== $rpassword) {
      $errors['rpassword'] = 'Passwords do not match.';
    }

    // Validate phone number
    if (empty($phonenumber)) {
      $errors['pnumber'] = 'Please fill in the phone number field.';
    } elseif (!preg_match('/^[0-9]{10}$/', $phonenumber)) {
      $errors['pnumber'] = 'Phone number should be 10 digits.';
    }

    // If there are no validation errors, proceed with further processing
    if (empty($errors)) {

      $query = "INSERT INTO users (firstname, lastname,username, email, role, password, phonenumber) VALUES
             ('$fname','$lastname','$username','$email','$role','$password','$phonenumber')";

      if (mysqli_query($conn, $query)) {

        echo 'Form submitted successfully!';
      } else {
        echo "error";
      }
    } else {
      // If there are validation errors, display them to the user
      foreach ($errors as $error) {
        echo $error . '<br>';
      }
    }
  }

  ?>