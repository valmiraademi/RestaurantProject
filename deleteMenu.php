<?php include_once "includes/sqlFunctions.php";

    function deleteMenu(){
        $menuid = $_POST['menuid'];
        $dbconn = connection();
        $sql = "DELETE FROM menus WHERE menuid = '$menuid'";
        $result = mysqli_query($dbconn,$sql);

        if($result){
            Header('Location: index.php#our-menu');
        }
    }

    deleteMenu();

?>