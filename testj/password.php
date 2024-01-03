
<?php
include_once 'includes/connect.php';
session_start();

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password']; // Get the user's password from the registration form
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $loginID = $_POST['loginID'];
    // Validate password against the same rules as in JavaScript
    $lowercaseRegex = '/[a-z]/';
    $uppercaseRegex = '/[A-Z]/';
    $numberRegex = '/[0-9]/';
    $specialCharRegex = '/[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/';

    $isLowercase = preg_match($lowercaseRegex, $password);
    $isUppercase = preg_match($uppercaseRegex, $password);
    $isNumber = preg_match($numberRegex, $password);
    $isSpecialChar = preg_match($specialCharRegex, $password);
    $isLengthValid = strlen($password) >= 8;

    if ($isLowercase && $isUppercase && $isNumber && $isSpecialChar && $isLengthValid) {
        $sql = "INSERT INTO [dbo].[HIOSS_Credentials]
    ([USERNAME]
      ,[LOGINID]
      ,[PASSWORD]
      ,[USERLEVEL]
      ,[ENABLED] 
      ,[CREATEDBY]) VALUES (?,?,?,?,?,?)";
    $stmt = odbc_prepare($hios, $sql);
    if(!$stmt){
        die("SQL statement preparation failed: " . odbc_errormsg($hios));
     }
 
     if (!odbc_execute($stmt, array($username , $loginID, $hashed_password , 'SysAdmin', 1, 'JFLORES' ))) {
        die ("SQLs statement preparation failed: " . odbc_errormsg($hios));
     } else {
        echo "Added Successfully";
     }
 
     odbc_close($hios);
    
    } else {
        echo 'Password does not meet the requirements.';
    }
    
 }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Password Requirements</title>
    <link rel="stylesheet" type="text/css" href="..\testj\style\pass.css">   
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <label for="username">Username:</label>
        <input type = "text" name = "username" id = "username" placeholder = "Enter Username"><br>
        <label for="loginID">LOGIN ID:</label>
        <input type = "number" name = "loginID" id = "loginID" placeholder = "Enter Username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder = "Enter Password"><br>
        <p class="requirements">Password must contain at least:</p>
        <ul class="requirements">
            <li class="lowercase">A lowercase letter</li>
            <li class="uppercase">An uppercase letter</li>
            <li class="number">A number</li>
            <li class="special-char">A special character</li>
            <li class="length">At least 8 characters</li>
        </ul>
        <button type="submit">Submit</button>
    </form>

    <script src="..\testj\script\line2.js"></script>
</body>
</html>
