<!DOCTYPE html>
<html lang="en">
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
html{
  background-color: lightblue;
}
form#signup{
  background-color: #fcfcfc;
  margin: 3% 70% 0% 10%;
  padding: 3% 10% 3% 3%;
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  position: absolute;
}
form#login{
  background-color: #fcfcfc;
  margin: 3% 10% 0% 70%;
  padding: 3% 10% 3% 3%;
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  position: absolute;
}
h1#su{
  margin: 2% 0 0 8%;
}
h1#l{
  margin: 2% 0 0 70%;
}
div{
    margin-top: 5%;
}
div#alert{
    margin-top: 0;
    padding-left: 2%;
}
  </style>

<body>
<form action="bootstrapsignup.php" method="post" id="signup">
    <div><h1 id="su">Sign Up</h1></div><br>
    <div>First Name:</div> <br>
    <input type="text" name="firstname" class="form-control" id="usr"><br></div>
    <div>Last Name:</div> <br>
    <input type="text" name="lastname" class="form-control" id="usr"><br></div>
    <div>Email Address:</div> <br>
    <input type="text" name="email" class="form-control" id="usr"><br></div>
    <div>Phone Number(No Spaces):</div> <br>
    <input type="text" name="phonenumber" class="form-control" id="usr"><br></div>
    <div>Birthday (yyyy-mm-dd):</div> <br>
    <input type="text" name="birthday" class="form-control" id="usr"><br></div>
    <div>Gender: <br>
      <div class="radio">
    Male<br><input type="radio" name="gender" value="male"><br>
  </div>
  <div class="radio">
    Female<br><input type="radio" name="gender" value="female"><br>
  </div>
  <div class="radio">
    Other<br><input type="radio" name="gender" value="other"><br></div>
  </div>
    <div>Password:</div> <br>
    <input type="password" name="password" class="form-control" id="pwd"><br></div>
    <input type="submit" value="register"></div>
  </form>

  <form action="bootstrapsignup.php" method="post" id="login">
    <div><h1 id="su">Login</h1></div><br>
    <div>Email Address:</div> <br>
    <input type="text" name="emaillog" class="form-control" id="usr"><br></div>
    <div>Password:</div> <br>
    <input type="password" name="passwordlog" class="form-control" id="pwd"><br></div>
    <input type="submit" value="login"></div>
  </form>
</body>
</html>
<?php
$errfirstname = $errlastname=$errphonenumber=$errbirthday=$erremail=$errgender=$errpassword = "";
$firstname = $lastname = $phonenumber = $birthday = $email = $gender = $password="";

if ($_SERVER['REQUEST_METHOD']=='POST'){
  if(empty($_POST["firstname"])){
      $errfirstname=" Enter First Name; ";
  }
  else{
    $firstname= $_POST["firstname"];
  }
  if(empty($_POST["lastname"])){
      $errlastname=" Enter Last Name; ";
  }
  else{
    $lastname= $_POST["lastname"];
  }
  if(empty($_POST["email"])){
      $erremail=" Enter Email Name; ";
  }
  else{
    $email= $_POST["email"];
  }
  if(empty($_POST["phonenumber"])){
      $errphonenumber=" Enter Phonenumber; ";
  }
  elseif((strlen($_POST["phonenumber"])!=10) and (strlen($_POST["phonenumber"])!=0)){
    $errphonenumber=" Enter 10 numbers for your phone number; ";
  }
  else{
    $phonenumber= $_POST["phonenumber"];
  }
  if(empty($_POST["birthday"])){
      $errbirthday=" Enter Birthday; ";
  }
  else{
    $birthday= $_POST["birthday"];
  }
  if(empty($_POST["gender"])){
      $errgender=" Enter Gender; ";
  }
  else{
    $gender= $_POST["gender"];
  }
  if(empty($_POST["password"])){
      $errpassword=" Enter Password; ";
  }
  else{
    $password= $_POST["password"];
  }
}
if (($errfirstname != "") or ($errlastname != "") or ($errempty != "") or ($errphonenumber != "") or ($errbirthday != "") or ($errgender != "")){
  echo "<div class='alert alert-warning' id='alert'><font size='3'><strong>Error: </strong>$errfirstname"."$errlastname"."$errempty"."$errphonenumber"."$errbirthday"."$errgender</font></div>";
}
else{

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
} 

$servername = "sql.njit.edu";
$username = "jss82";
$dbpassword = "uxVObupGn";
$dbname = "jss82";

switch($_POST['submit']){
  case 'login':
  echo "1";
  case 'register':
  echo "2";
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT*FROM accounts WHERE  email='$email'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $tresult=$stmt->fetchAll();
    if (empty($tresult)){
      #Generate New ID
      $stmt=$conn->prepare("SELECT COUNT(*) FROM accounts");
      $stmt->execute();
      $countrows=$stmt->fetch(PDO::FETCH_NUM);
      $newid= $countrows[0] + 2;
      $stmt=$conn->prepare("INSERT INTO accounts VALUES ('$newid', '$email', '$firstname', '$lastname', 
        '$phonenumber', '$birthday', '$gender', '$password')");
      $stmt->execute();
      echo "<div class='alert alert-success' id='alert'><font size='3'><strong>Successful registration.</strong></font></div>";
      #add password to form
    }
    elseif($email!=''){
      #This prevents it from activating immediately on loading the page (will be '')
      echo "<div class='alert alert-warning' id='alert'><font size='3'><strong>Email already in use,</strong> enter a new Email.</font></div>";
    }

}
catch(PDOException $e) {
    echo "<div class='alert alert-danger' id= alert'>Error: " . $e->getMessage()."</div>";
}
$conn = null;
}

?>