<!DOCTYPE html>
<html>

<head>
    <title>Dine Out</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/3ca95fdef9.js"></script>
    <style>
        .errors {
            color: red;
            font-size: 14px;
            float: left;
            margin-left: 30px;
            margin: -12px 0px -12px 30px;
        }
    </style>
</head>

<?php
    include_once 'includes/sqlFunctions.php';
    if(isset($_POST['register'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

        $emailcheck = checkEmail($email);
        $usernamecheck = checkUsername($username);

        if(mysqli_num_rows($emailcheck) > 0 ){
            $email_error = "Sorry,this email is already taken!";
        }else if(mysqli_num_rows($usernamecheck) > 0){
            $username_error = "Sorry,this username is already taken!";
        }else{
            header('Location: login.php');
            $result = register($firstname,$lastname,$phone,$email,$username,$password);
        }
    }
?>

<body style="background-color: #191f3a;">
    <div class="login-page" style="width: 600px;">
        <h1>Register</h1>

        <p class="errors"></p>
        <form class="login-form" id="loginForm" name="RegForm" method="post" onsubmit="return ValidimRegister()">
            <input type="text" placeholder="Firstname" name="firstname">
            <input type="text" placeholder="Lastname" name="lastname">
            <input type="text" placeholder="Phone" name="phone">
            <input type="email" placeholder="Email" name="email">
                <?php if(isset($email_error)): ?>
                <span style="color:red;margin-left:40px;"><?php echo $email_error; ?></span>
                <?php endif ?> </br>
            <input type="text" placeholder="Username" id="username" name="username" />
                <?php if(isset($username_error)): ?>
                <span style="color:red;margin-left:40px;"><?php echo $username_error; ?></span>
                <?php endif ?>
            <input type="password" placeholder="Password" id="password" name="password" />
            <p style="margin-right: 33px;float:right">You have account?<span style="color: #eaa023;"><a
                        style="color: #eaa023;text-decoration:none; padding-left:10px"
                        href="login.php">Login</a></span></p>
            <input type="submit" value="Register" name="register">
        </form>
    </div>
    <script> 
            function ValidimRegister() { 
                var firstname =  
                    document.forms["RegForm"]["firstname"]; 
                var lastname =  
                    document.forms["RegForm"]["lastname"]; 
				var phone =  
                    document.forms["RegForm"]["phone"]; 
                var phoneno = /^\+383[- ](43|44|45|46|49)[- ]([0-9]{3})[- ]([0-9]{3})/;
                var email =  
                    document.forms["RegForm"]["email"]; 
                var emailvalidation = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                var username =  
                    document.forms["RegForm"]["username"]; 
                var password =  
                    document.forms["RegForm"]["password"]; 
            
                if (firstname.value == "") { 
                    window.alert("Please enter your firstname."); 
                    firstname.focus(); 
                    return false; 
                } 
  
                if (lastname.value == "") { 
                    window.alert("Please enter your lastname."); 
                    lastname.focus(); 
                    return false; 
                } 
  
                if(phone.value == ""){
                    window.alert("Please enter the user phone!");
                    phone.focus();
                    return false;
                }else if(!phone.value.match(phoneno)){
                    window.alert("Please enter a valid phone number in right format: +383-xx-xxx-xxx");
                    phone.focus();
                    return false;
                } 
  
                if(email.value == ""){
                    window.alert("Please enter the user email!");
                    email.focus();
                    return false;
                }else if(!email.value.match(emailvalidation)){
                    window.alert("Please enter a valid email!");
                    email.focus();
                    return false;
                }
  
                if (username.value == "") { 
                    window.alert("Please enter your username"); 
                    username.focus(); 
                    return false; 
                } 
  
                if (password.value == "") { 
                    window.alert("Please enter a password"); 
                    password.focus(); 
                    return false; 
                } 
  
                return true; 
            } 
        </script> 
</body>

</html>