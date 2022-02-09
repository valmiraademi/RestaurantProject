<?php 
    include_once 'includes/sqlFunctions.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Restaurant</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/3ca95fdef9.js"></script>
    <style>
        .errors{
            color: red;
            font-size: 12px;
            float: left;
            margin-left: 30px;
            margin: -12px 0px -12px 30px;
        }
    </style>
</head>

<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $usernamecheck = checkUsername($username);
        
        if(mysqli_num_rows($usernamecheck) == 0){
            $username_error = "Sorry this username doesn't exist!";
        }else{
            login($username,$password);
        }
    }
?>


<body style="background-color: #191f3a;">
    <div class="login-page">
        <h1>Login</h1>
        
        <p class="errors" style="margin-bottom: 5px;"></p>
        <form class="login-form" id="loginForm" method="post">
            <input type="text" placeholder="username" id="username" name="username"/>
            <p id="usernameMessage" class="errors"></p>
                <?php if(isset($username_error)): ?>
                <span style="color:red;margin-left:40px;"><?php echo $username_error; ?></span>
                <?php endif ?> </br>
            <div style="clear: both;"></div>
            <input type="password" placeholder="password" id="password" name="password"/>
            <p id="passwordMessage" class="errors"></p>
            <div style="clear: both;"></div>
            <p style="margin-right: 25px;float:right">You don't have an account?<span><a style="color: #eaa023;text-decoration:none;padding-left:10px" href="register.php">Register</a></span></p>
            <input type="submit" value="Login" name="login">
        </form>
    </div>

</body>
<script src="js/jQuery.js"></script>
    <script>
        $(document).ready(function(){
            $("#loginForm").submit(function(){
                var username = $("#username").val();
                var password = $("#password").val();
                var errors = false;
                if(username == ""){
                    $("#usernameMessage").html("Ju lutem shkruani username-in!");
                    errors = true;
                }else{
                    $("#usernameMessage").html("");
                    errors = false;
                }
                if(password == ""){
                    $("#passwordMessage").html("Ju lutem shkruani password-in!");
                    errors = true;
                }else{
                    $("#passwordMessage").html("");
                    errors = false;
                }
                if(errors){
                    return false;
                }else{
                    return true;
                }
            });
        });
    </script>
</html>