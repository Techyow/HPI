
<?php
include_once 'includes/connect.php';
session_start();

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $oldpass = $_POST['oldPassword'];
    $newpass = $_POST['password'];
    $hashed_pnewpass = password_hash($newpass, PASSWORD_DEFAULT);
    $confirmnewpass = $_POST['confirmNewPassword'];

    // validate password against the same rules as in JavaScript
    $lowercaseRegex = '/[a-z]/';
    $uppercaseRegex = '/[A-Z]/';
    $numberRegex = '/[0-9]/';
    $specialCharRegex = '/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/';

    $isLowercase = preg_match($lowercaseRegex, $newpass);
    $isUppercase = preg_match($uppercaseRegex, $newpass);
    $isNumber = preg_match($numberRegex, $newpass);
    $isSpecialChar = preg_match($specialCharRegex, $newpass);
    $isLengthValid = strlen($newpass) >= 8;

    $sqlselect = "SELECT * FROM PCS_LogIn WHERE username = '$username'";
    $result = odbc_exec($conn, $sqlselect);
    $row = odbc_fetch_array($result);
    $passwordfromdb1 = $row['password'];
    $passwordfromdb2 = $row['password2'];
    $passwordfromdb3 = $row['password3'];
    $passwordfromdb4 = $row['password4'];
    $passwordfromdb5 = $row['password5'];
    $passcountfromdb = $row['passcount'];
    
    switch ($passcountfromdb) {
        case 1:     //if passcount in database = 1 store the password1 to variable oldpassfromdb
            $oldpassfromdb = $passwordfromdb1;
            break;
        case 2:
            $oldpassfromdb = $passwordfromdb2;
            break;
        case 3:
            $oldpassfromdb = $passwordfromdb3;
            break;
        case 4:
            $oldpassfromdb = $passwordfromdb4;
            break;
        case 5:
            $oldpassfromdb = $passwordfromdb5;
            break;
        default:
            echo 'not in database';
    }
    
    
    function checkIfPasswordExists($passwordFromDB, $newpass) { //function check if the password is already used 5 times
        foreach ($passwordFromDB as $password) {
            if (password_verify($newpass, $password)) {
                return true; // Password is already used
            }
        }
        
        return false; // Password is not found
    }  
   
    if (password_verify($oldpass, $oldpassfromdb)) { // check if the old password is matched
      $_SESSION['username'] = $username;
      if ($isLowercase && $isUppercase && $isNumber && $isSpecialChar && $isLengthValid) { //if the password requirement has satified
        if ($newpass == $confirmnewpass){ //check if the new pass is matched to confirm new password
          if ($result) { 
            $passwordsFromDB = [$passwordfromdb1, $passwordfromdb2, $passwordfromdb3, $passwordfromdb4, $passwordfromdb5]; //store in 1 variable
            if ($passcountfromdb == 1){    //if passcount in db = 1
              if (checkIfPasswordExists($passwordsFromDB, $newpass)) { //check if the new password has not yet inputed 5 times
                  echo "Password is already Used. Please use another Password";
              }elseif (!checkIfPasswordExists($passwordsFromDB, $newpass)) { // execute if the new password has not yet inputed 5 times
                    $sqlpass2 = "UPDATE PCS_LogIn SET password2 = '$hashed_pnewpass', passcount = 2 WHERE username = '$username' ";
                    $resultpass2 = odbc_prepare($conn, $sqlpass2);
                  if (!odbc_execute($resultpass2, array($hashed_pnewpass))) {
                    die ("SQLs statement preparation failed: " . odbc_errormsg($conn));
                  } else {
                      echo "Password Changed Successfully";
                  }
                }
          }elseif ($passcountfromdb == 2){
              if (checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  echo "Password is already Used. Please use another Password";
              }elseif (!checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  $sqlpass3 = "UPDATE PCS_LogIn SET password3 = '$hashed_pnewpass', passcount = 3 WHERE username = '$username' ";
                  $resultpass3 = odbc_prepare($conn, $sqlpass3);
                  if (!odbc_execute($resultpass3, array($hashed_pnewpass))) {
                  die ("SQLs statement preparation failed: " . odbc_errormsg($conn));
                  } else {
                      echo "Password Changed Successfully";
                  }
                }
          }elseif ($passcountfromdb == 3){
              if (checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  echo "Password is already Used. Please use another Password";
              }elseif (!checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  $sqlpass4 = "UPDATE PCS_LogIn SET password4 = '$hashed_pnewpass', passcount = 4 WHERE username = '$username' ";
                  $resultpass4 = odbc_prepare($conn, $sqlpass4);
                  if (!odbc_execute($resultpass4, array($hashed_pnewpass))) {
                    die ("SQLs statement preparation failed: " . odbc_errormsg($conn));
                  } else {
                      echo "Password Changed Successfully";
                    }
                  }
          }elseif ($passcountfromdb == 4){
              if (checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  echo "Password is already Used. Please use another Password";
              }elseif (!checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  $sqlpass5 = "UPDATE PCS_LogIn SET password5 = '$hashed_pnewpass', passcount = 5 WHERE username = '$username' ";
                  $resultpass5 = odbc_prepare($conn, $sqlpass5);
                  if (!odbc_execute($resultpass5, array($hashed_pnewpass))) {
                      die ("SQLs statement preparation failed: " . odbc_errormsg($conn));
                  } else {
                      echo "Password Changed Successfully";
                    }
                  }
          }elseif ($passcountfromdb == 5){
              if (checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  echo "Password is already Used. Please use another Password";
              }elseif (!checkIfPasswordExists($passwordsFromDB, $newpass)) {
                  $sqlpass1 = "UPDATE PCS_LogIn SET password = '$hashed_pnewpass', passcount = 1 WHERE username = '$username' ";
                  $resultpass1 = odbc_prepare($conn, $sqlpass1);
                  if (!odbc_execute($resultpass1, array($hashed_pnewpass))) {
                    die ("SQLs statement preparation failed: " . odbc_errormsg($conn));
                  } else {
                    echo "Password Changed Successfully";
                  }
                }
          }
        }
      }else { // if the new password do not match to confirm password
             echo "Passwords do not match. Please make sure the new password and confirmation match.";
        } 
             odbc_close($conn);
            
    }else { //if the password do not meet the requirements (New Password)
                echo 'Password does not meet the requirements.';
    }
  }else {
        echo "Old Password is Incorrect";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="..\testj\style\pass.css">   
</head>
<body>
 <h1>Change Password</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <label for="username">Username:</label>
        <input type = "text" name = "username" id = "username" placeholder = "Enter Username"><br>
        <label for="oldPassword">Old Password:</label>
        <input type="password" name="oldPassword" id="oldPassword" placeholder = "Enter Old Password"><br>
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" placeholder = "Enter New Password"><br>
        <p class="requirements">Password must contain at least:</p>
        <ul class="requirements">
            <li class="lowercase">A lowercase letter</li>
            <li class="uppercase">An uppercase letter</li>
            <li class="number">A number</li>
            <li class="special-char">A special character</li>
            <li class="length">At least 8 characters</li>
        </ul>
        <label for="confirmNewPassword">Confirm New Password:</label>
        <input type="password" name="confirmNewPassword" id="confirmNewPassword" placeholder = "Confrim New Password"><br>
        <button type="submit">Submit</button>
    </form>
    <script src="..\testj\script\line2.js"></script>
</body>
</html>
