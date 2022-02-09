<?php
    include_once "includes/sqlFunctions.php";

    function deleteChef(){
        $chefsid = $_POST['chefsid'];
        $dbconn = connection();
        $sql = "DELETE FROM chefs WHERE chefsid = '$chefsid'";
        $result = mysqli_query($dbconn,$sql);
        if($result){
            Header("Location: dashboard.php");
        }
    }

    deleteChef();

?>