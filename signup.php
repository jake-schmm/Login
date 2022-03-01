<!-- Some design copied from https://www.sitepoint.com/users-php-sessions-mysql -->
<html>
<style>
    button {
        background-color: blue;
        color: white;
    }
    .endScreen {
        width: 400px;
        margin: 0 auto;
        text-align: center;
        padding: 70px 0;
    }

</style>


<?php
include 'common.php';
include 'db_inc.php';

if(!isset($_POST['submitok'])) {
    // display the user signup form 
}

else {
    // enter new user into db 
    if($_POST['newname'] == '' or $_POST['newemail'] == '' or $_POST['newpassword'] == '') {
        error("Please fill out all required fields in form");
    }
   
    $sql="SELECT COUNT(*) FROM accounts WHERE account_name = :usernameChoice";
    $stmt= $conn->prepare($sql);
    $usernameChoice = $_POST['newname'];
    $stmt->bindParam(':usernameChoice', $usernameChoice);
    
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $proceed = false;

    /* After connecting to database: if a username has been found with the username entered */
    if($result[0]["COUNT(*)"] > 0) {
        echo "<script>
            alert('A user with the username already exists.');
            history.back(); 
        </script>";    
    }
    
    else if(!$result) {
        echo "A database error occured in processing your submission."; 
    }
    else {
        $proceed = true;
    }
    
    /* for each db row that is returned in the result set, get the column named COUNT(*) */
    /* so if there is one row returned, return COUNT(*) value for that row */
    /* foreach($result as $row) {
        print("Count: " . $row["COUNT(*)"]);
    }
    */
 
    if($proceed) { 
        // $newpass = substr(md5(time()), 0, 6); // for generating a password for the user 

        $insertQuery = "INSERT INTO accounts SET 
        account_name = :username, 
        account_pwd = :passwd,
        account_email = :email,
        account_reg_time = now(),
        account_enabled = 1,
        notes = :notes";
        
        $stmt2 = $conn->prepare($insertQuery);
        $stmt2->bindParam(':username', $_POST['newname']);
        $stmt2->bindParam(':passwd', $_POST['newpassword']);
        $stmt2->bindParam(':email', $_POST['newemail']);
        $stmt2->bindParam(':notes', $_POST['newnotes']);

    
        $inserted = $stmt2->execute();
    
        if(!$inserted) {
            error("A database error occured in processing your submission.");
        }
        else {
            // redirect to login screen
            echo "<div class='endScreen'>
            Successfully registered user." . "<br>";
            echo "<form action='UserLoginForm.html' method='POST'>
            
            <button type='submit'>Go to Login</button>
            
            </form>
            </div>";
        }

    }
}
?>

</html>
