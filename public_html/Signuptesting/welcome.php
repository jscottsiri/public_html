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
div{
  background-color: #fcfcfc;
  margin: 8% 70% 0% 10%;
  padding: 3% 20% 3% 3%;
  border-width: 2px;
  border-color: #000000;
  border-style: solid;
  position: absolute;
}
div#badlog{
background-color: #fcfcfc;
  margin: 8% 70% 0% 10%;
  padding: 3% 3% 3% 3%;
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

div#alert{
    margin-top: 0;
}
  </style>
<?php
$bool=false;
if ($_SERVER['REQUEST_METHOD']=='POST'){
	if(empty($_POST["emaillog"])){
    	$erremaillog="Error, Login Email";
	}
	else{
		$emaillog= $_POST["emaillog"];
		if(empty($_POST["passwordlog"])){
    		$errpasswordlog="Error, Enter Login Password";
	}
		else{
			$passwordlog= $_POST["passwordlog"];
			$bool=true;
	}
	
	}

}

if (($erremaillog != "") or ($errpasswordlog != "")){
	echo "$erremaillog"."$errpasswordlog";
}
if ($bool){
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
    $stmt = $conn->prepare("SELECT*FROM accounts WHERE  email='$emaillog' AND password='$passwordlog'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $tresult=$stmt->fetchAll();
    #tresult (or any fetchAll) works by being an array of arrays, with the first array (accessed numerically) being a row of results and the array within it an associative array with all of the column names.
    if ($tresult[0]['fname']!= ""){
    $fname= $tresult[0]['fname'];
    echo "<div><font size='10'>".$fname."<br><br>";
    $lname= $tresult[0]['lname'];
    echo $lname."<br></font></div>";
}
    else{
        echo "<div id='badlog'><font size='7'>Bad Login, Provide Correct Login Details<br></font></div>";
    }
    #Where I am at: I just figured out how to get the things from each column into variables. We literally just need to format this nicely, then optimize.
    

}
catch(PDOException $e) {
    echo "<div class='alert alert-danger' id= alert'>Error: " . $e->getMessage()."</div>";
}
$conn = null;
}
?>
<html>
	

</html>