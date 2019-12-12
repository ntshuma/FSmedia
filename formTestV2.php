<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
//By Nyaladzani Tshuma. With some help from google, https://stackoverflow.com/ and w3Schools.
// define variables and set to empty values
$firstNameErr = $emailErr = $lastNameErr = $q1Err = $q2Err = $q3Err = "";
$firstName = $email = $lastName = $q1 = $q2 = $q3 = "";
$start = "Your final answer to this question is ";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstName"])) {
    $firstNameErr = "First Name is required";
  } else {
    $firstName = test_input($_POST["firstName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
      $firstNameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["lastName"])) {
    $lastNameErr = "Last Name is required";
  } else {
    $lastName = test_input($_POST["lastName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
      $lastNameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (empty($_POST["q1"])) {
    $q1Err = "Answer is required";
  } else {
    $q1 = test_input($_POST["q1"]);
  }


  if (empty($_POST["q2"])) {
    $q2Err = "Answer is required";
  } else {
    $q2 = test_input($_POST["q2"]);
  }

  if (empty($_POST["q3"])) {
    $q3Err = "Answer is required";
  } else {
    $q3 = test_input($_POST["q3"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Enter your name and email and answer the questions</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="FSsave.php">  
  First Name: <input type="text" name="firstName" value="<?php echo $firstName;?>">
  <span class="error">* <?php echo $firstNameErr;?></span>
  <br><br>
  Second Name: <input type="text" name="lastName" value="<?php echo $lastName;?>">
  <span class="error">* <?php echo $lastNameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Q1: 24 x 10: <input type="text" name="q1" value="<?php echo $q1;?>">
  <span class="error">* <?php echo $q1Err;?></span>
  <br><br>

  Q2: 12 + 13: <input type="text" name="q2" value="<?php echo $q2;?>">
  <span class="error">* <?php echo $q2Err;?></span>
  <br><br>

  Q3: 29 - 13: <input type="text" name="q3" value="<?php echo $q3;?>">
  <span class="error">* <?php echo $q3Err;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php

?>