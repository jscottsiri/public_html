<?php
$numcount = 0;
echo "<table style='border: solid 2px black;'>";
echo "<tr><th>Id</th><th>Email</th><th>Fname</th><th>Lname</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:200px;height:50px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "sql.njit.edu";
$username = "jss82";
$password = "uxVObupGn";
$dbname = "jss82";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT*FROM accounts WHERE ID<6"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        $numcount+=1;
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

//totalnum is divided by 8 because there are 8 box categories per record.
$totalnum=$numcount/8;
echo "There are $totalnum records.<br>";
?>