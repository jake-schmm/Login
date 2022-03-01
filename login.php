<html>

<style>
    p {
        width: 400px;
        margin: 0 auto;
        text-align: center;
    }
</style>

<?php

session_start();

require './db_inc.php';

if(isset($_POST)) {
  

    $query = "SELECT * FROM accounts WHERE account_name = :username AND account_pwd= :password"; 
    $stmt = $conn->prepare($query); 
    $stmt->bindParam(':username', $username); // first param is the : param in the query
    $stmt->bindParam(':password', $password);
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    filter_input(INPUT_POST, $username, FILTER_SANITIZE_STRING);
    filter_input(INPUT_POST, $password, FILTER_SANITIZE_STRING);
    $stmt->execute();

    $result = $stmt->fetchAll();

    if(!$result) {
        // check if username exists 
        $query2 = "SELECT * FROM accounts WHERE account_name = :username";
        $stmt2 = $conn->prepare($query2); 
        $stmt2->bindParam(':username', $username);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll();

        // username doesn't exist 
        if(!$result2) {
            echo "<p>Username " . $username . " doesn't exist</p>";
        }

        // if it does exist, then password was invalid because no match was found in database for the username and password combination
        else {
            echo "<p>Invalid password<p>"; 
        }
       
    }
    else {
        echo "<p>Logged in successfully.<p>";
    }
    
}
?>

</html>
