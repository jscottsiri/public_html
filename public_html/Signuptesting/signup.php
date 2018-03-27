<html>
<link rel="stylesheet" href="Signup.css">
	<head>
		<h1 id="su">Sign Up</h1>
	</head>
	<form action="signup.php" method="post" id="signup">
		<div>First Name:</div> <br>
		<input type="text" name="firstname"><br></div>
		<div>Last Name:</div> <br>
		<input type="text" name="lastname"><br></div>
		<div>Email Address:</div> <br>
		<input type="text" name="email"><br></div>
		<div>Phone Number(No Spaces):</div> <br>
		<input type="text" name="phonenumber"><br></div>
		<div>Birthday (yyyy-mm-dd):</div> <br>
		<input type="text" name="birthday"><br></div>
		<div>Gender: <br>
		Male<br><input type="radio" name="gender" value="male"><br>
		Female<br><input type="radio" name="gender" value="female"><br>
		Other<br><input type="radio" name="gender" value="other"><br></div>
		<div>Password:</div> <br>
		<input type="text" name="password"><br></div>
		<input type="submit"></div>
	</form>

</html>
<?php
$errfirstname = $errlastname=$errphonenumber=$errbirthday=$erremail=$errgender=$errpassword = "";
$firstname = $lastname = $phonenumber = $birthday = $email = $gender = $password="";

if ($_SERVER['REQUEST_METHOD']=='POST'){
	if(empty($_POST["firstname"])){
    	$errfirstname="Error, Enter First Name";
	}
	else{
		$firstname= $_POST["firstname"];
	}
	if(empty($_POST["lastname"])){
    	$errlastname="Error, Enter Last Name";
	}
	else{
		$lastname= $_POST["lastname"];
	}
	if(empty($_POST["email"])){
    	$erremail="Error, Enter Email Name";
	}
	else{
		$email= $_POST["email"];
	}
	if(empty($_POST["phonenumber"])){
    	$errphonenumber="Error, Enter Phonenumber";
	}
	elseif((strlen($_POST["phonenumber"])!=10) and (strlen($_POST["phonenumber"])!=0)){
		$errphonenumber="Error, Enter 10 numbers for your phone number";
	}
	else{
		$phonenumber= $_POST["phonenumber"];
	}
	if(empty($_POST["birthday"])){
    	$errbirthday="Error, Enter Birthday";
	}
	else{
		$birthday= $_POST["birthday"];
	}
	if(empty($_POST["gender"])){
    	$errgender="Error, Enter Gender";
	}
	else{
		$gender= $_POST["gender"];
	}
	if(empty($_POST["password"])){
    	$errpassword="Error, Enter Password";
	}
	else{
		$password= $_POST["password"];
	}
}
if (($errfirstname != "") or ($errlastname != "") or ($errempty != "") or ($errphonenumber != "") or ($errbirthday != "") or ($errgender != "")){
	echo "$errfirstname"."$errlastname"."$errempty"."$errphonenumber"."$errbirthday"."$errgender";
}
else{
	echo "Success";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }
} 

$servername = "sql.njit.edu";
$username = "jss82";
$dbpassword = "uxVObupGn";
$dbname = "jss82";


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
    	echo $newid;
    	$stmt=$conn->prepare("INSERT INTO accounts VALUES ('$newid', '$email', '$firstname', '$lastname', 
    		'$phonenumber', '$birthday', '$gender', '$password')");
    	$stmt->execute();
    	#add password to form
    }
    elseif($email!=''){
    	#This prevents it from activating immediately on loading the page (will be '')
    	echo 'Email already in use, use different email.';
    }

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
}

?>
<html>
<head>
		<h1 id="l">Login</h1>
	</head>
	<form action="welcome.php" method="post" id="login">
		<div>Email: </div> <br>
		<input type="text" name="emaillog"><br></div>
		<div>Password: </div><br>
		<input type="text" name="passwordlog"><br></div>
		<input type="submit"></div>
	</form>
</html>