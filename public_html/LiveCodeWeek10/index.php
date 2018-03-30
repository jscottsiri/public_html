
<?php
class User{

  function show(){

$sql = "select id,email,fname,password from accounts  ";
$results = runQuery($sql);
if(count($results) > 0)
{
  echo '<table border=\"1\"><tr><th>ID</th><th>Email</th><th>First Name</th><th>Pass</th></tr>';
  foreach ($results as $row) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["fname"]."</td><td>".$row["password"]."</td></tr>";
  }
  
}else{
    echo '0 results';
}
  }

  function insert(){
    $date = date('Y-m-d',time());
    $sql = "insert into accounts (email, fname, lname,phone, birthday,
    gender,password) values ('yz746@njit.edu','Bongo', 'Zhao','911','$date','Male','1234');";
    $results = runQuery($sql);
  }
  function update(){
    $fname = 'Bongo';
    $sql ="update accounts set password = '4321' where fname = '$fname' ";
    $results = runQuery($sql);
  }
  function delete(){
    $fname = 'Bongo';
    $sql ="delete from accounts where fname = '$fname' ";
    $results = runQuery($sql);
  }
}
$user=new User();
$hostname = "sql.njit.edu";
$username = "jss82";
$password = "uxVObupGn";
$dbname= "jss82";
$conn = NULL;
try 
{
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname",
    $username, $password);
}
catch(PDOException $e)
{
  // echo "Connection failed: " . $e->getMessage();
  http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
}

// Runs SQL query and returns results (if valid)
function runQuery($query) {
  global $conn;
    try {
    $q = $conn->prepare($query);
    $q->execute();
    $results = $q->fetchAll();
    $q->closeCursor();
    return $results;  
  } catch (PDOException $e) {
    http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
  }   
}

function http_error($message) 
{
  header("Content-type: text/plain");
  die($message);
}

$mode = $_GET["case_label"];
switch ($mode) {
  case 'insert':
    $user->insert();
    $user->show();
    break;
  case 'update':
    $user->update();
    $user->show();
    break;
  case 'delete':
    $user->delete();
    $user->show();
    break;
  case 'show':
    $user->show();
    break;
}

?>
<html>
<head>
  <title>Home for PDO</title>
</head>
<body>
<div id="about" class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <h1 style="color:black">welcome to IS218 party!</h1>
        <h1 style="color:black"><?php echo "$mode" ?></h1>
      </div>
    </div>
  </div>

  <div class="container" style="color:black"> 
    <form method="get" action="index.php" >
      <div class="form-group">
        <label>Task:</label>
        <!-- <input type="text" name="case_label" id="task"/> -->
        <select name="case_label">
          <option value="show">show</option>
          <option value="insert">insert</option>
          <option value="update">update</option>
          <option value="delete">delete</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="Send" />
      </div>
    </form>
  </div>
</body>
</html>
