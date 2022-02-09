<?php
 include_once 'includes/sqlFunctions.php';

function deleteUser(){
     $userid = $_POST['userid'];
     $contactid = $_POST['contactid'];
     $dbconn = connection();
     $sql = "DELETE FROM users WHERE userid = '$userid'";
     $result = mysqli_query($dbconn, $sql);
     
    if($result){
         header('Location: dashboard.php');
    }
}

    deleteUser();

?>