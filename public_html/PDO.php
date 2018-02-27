<?php
$dsn= 'mysq:host=sql.njit.edu; dbname=jss82';
$username='jss82';
$password='uxVObupGn';

try{
    $dbh = new pdo( $dsn, $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected Successfully <br>';
    $query='SELECT userID
    		FROM accounts
    		WHERE userID<6';
    $statement=$dbh->prepare($query);
    $statement->execute();
    $result=statement->fetchALL();
    $statement->closeCursor();
    <tr>
    	<td><?php echo $result; ?></td>
    </tr>
catch(PDOException $e){
    $error_message=$e->getMessage();
    echo "An error occurred while connecting to the database: $error_message </br>";
}
?>