<?php
require_once ('db.php');

if(isset($_POST['action']) && $_POST['action'] == 'login'){
    // Escape entered values to prevent SQL injection
    $user = strtolower(mysqli_real_escape_string($db, $_POST['user']));
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
    $pass = md5($pass); //encrypt incoming pass

    if(!empty($user) && !empty($pass)){

        // Query through our database to search for a user that has been entered
        $query = mysqli_query($db, "SELECT user FROM users WHERE user = '$user' AND pass ='$pass'");

        if(mysqli_num_rows($query) == 1){
            while($row = mysqli_fetch_assoc($query)){
    			$_SESSION['login_user']=$row['user']; // Initializing Session
    			/*If the entered user and pass are correct, return 1 */
                echo '1';
            }
        } else {
            /* If the entered user or pass do not match, return 2 */
            echo '2';
        }
    } else {
        /* If both fields are empty, return 3 */
        echo '3';
    }
}
else { // Log out

    session_destroy();

    header("Location: ../index.php");
}
?>